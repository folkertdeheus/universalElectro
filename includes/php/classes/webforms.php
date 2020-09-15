<?php

namespace Blackbeard;

class Webforms extends Queries
{

    private $required = []; // array of required POST fields
    private $post = null; // POST data sanitized
    private $salt = null; // Password hash salt, set in constructor
    private $cSalt = null; // Customer password hash salt, set in constructor

    // List accepted forms
    private $forms = [
        'createCustomer',
        'editCustomer',
        'changepassword',
        'contact',
        'addTicket',
        'ticketReply',
        'addtocart',
        'updatecart'
    ];
    
    /**
     * The constructor checks for any sent forms
     * The form name must be in the class variable $forms
     * If the form name is found, call the class method
     */
    function __construct()
    {
        $this->salt = $GLOBALS['salt'];
        $this->cSalt = $GLOBALS['customerSalt'];

        if (isset($_POST['form']) && in_array($_POST['form'],$this->forms)) {
            $form = $_POST['form']; // Direct handling isn't allowed, so one variable needed
            $this->$form();
        }
    }

    /**
     * This function checks if all of the required post fields are POSTed
     * It does this by counting the rows in $required and compare it against the matches found in the POST data
     * It takes the data directly from $this->required and $this->post, as set by $this->setReq
     * 
     * @return boolean
     */
    private function checkReq() : bool
    {
        if (count(array_intersect_key($this->required, $this->post)) == count($this->required)) {
            return true;
        }
        return false;
    }

    /**
     * This function set and sanitizes required post fields
     * This functions also removes empty POST entries
     * 
     * @param string $required, variable length of required POST fields
     */
    private function setReq(...$required) : void
    {
        // Set required array
        foreach($required as $value) {
            $this->required[$value] = null;
        }

        // Remove empty entries
        $this->post = array_filter($_POST);
    }

    /**
     * Add customer through website login page
     */
    public function createCustomer() : void
    {
        // Set required $_POST fields
        $this->setReq('firstname', 'lastname', 'email', 'password', 'rpassword');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Add', 'Adding customer through website failed, not all required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'password' && $key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $this->insertLog('Customers', 'Add', 'Adding customer failed, email is not valid ('.$email.')');
            return;
        }

        // Check if email is unique
        if ($this->countCustomersByEmail($email) != 0) {

            $this->insertLog('Customers', 'Add', 'Adding customer failed, email is not unique ('.$email.')');
            return;
        }

      // Hash password
        $password = hash('whirlpool', $this->cSalt.$_POST['password']);

        // Insert customer
        if ($this->addCustomers($firstname, $insertion, $lastname, $email, $phone, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $password, null) == 1) {

            // Check if email adress is added, and only exists 1 time
            if ($this->countCustomersByEmail($email) == 1) {

                // Log user in
                $_SESSION['webuser'] = $this->getCustomersByEmail($email)['id'];

                // Succes
                $this->insertLog('Customers', 'Add', 'Added customer '.$firstname.' '.$insertion.' '.$lastname.' with ID '.$this->getCustomerByName($firstname, $lastname)['id'].' through website, and logged in.');

            } else {

                // Partial Succes
                $this->insertLog('Customers', 'Add', 'Added customer '.$firstname.' '.$insertion.' '.$lastname.' with ID '.$this->getCustomerByName($firstname, $lastname)['id'].' through website, but not logged in.');
            }

        } else {
            // Failed
            $this->insertLog('Customers', 'Add', 'Adding customer '.$firstname.' '.$insertion.' '.$lastname.' failed through website.');
        }
    }

    /**
     * Edit customer through website page
     */
    public function editCustomer() : void
    {
        // Set required $_POST fields
        $this->setReq('firstname', 'lastname', 'email');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Edit', 'Editting customer ('.$_SESSION['webuser'].') through website failed, not all required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'password' && $key != 'form') {
                $$key = htmlentities($value);
            }
        }

        if ($this->editCustomerWeb($firstname, $insertion, $lastname, $email, $phone, $company, $billing_street, $billing_housenumber, $billing_postalcode, $billing_city, $billing_provence, $billing_country, $shipping_street, $shipping_housenumber, $shipping_postalcode, $shipping_city, $shipping_provence, $shipping_country, $taxnumber, $_SESSION['webuser']) == 1) {
            
            // Succes
            $this->insertLog('Customers', 'Edit', 'Editting customer '.$lastname.', '.$firstname.' '.$insertion.' ('.$_SESSION['webuser'].') through web');
        
        } else {

            // Failed
            $this->insertLog('Customers', 'Edit', 'Editting customer '.$lastname.', '.$firstname.' '.$insertion.' ('.$_SESSION['webuser'].') failed through web');
        }
    }

    /**
     * Change password through website
     */
    public function changePassword() : void
    {
        // Set required $_POST fields
        $this->setReq('oldpassword', 'newpassword', 'repeatpassword');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed, not all required fields are set');
            return;
        }

        if ($_POST['newpassword'] != $_POST['repeatpassword']) {

            // New password and repeated password did not match
            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed, new password did not match with the repeated password');
            return;
        }

        // Get customer data
        $customer = $this->getCustomer($_SESSION['webuser']);

        // Salt passwords
        $salt = $GLOBALS['customerSalt'];
        $oldPassword = hash('whirlpool', $salt.$_POST['oldpassword']);
        $newPassword = hash('whirlpool', $salt.$_POST['newpassword']);

        if ($oldPassword != $customer['password']) {

            // Old password not correct
            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed, old password was not correct');
            return;
        }

        if ($this->editCustomerPassword($newPassword, $_SESSION['webuser']) == 1) {

            // Succes
            $this->insertLog('Customers', 'Edit', 'Password of '.$customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion'].' ('.$_SESSION['webuser'].') changed');
        
        } else {

            // Failed
            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed');
        }


    }

    /**
     * Send contact form
     */
    public function contact() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'email', 'subject', 'message');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Contact', 'Add', 'Adding and sending message failed, not al required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                $$key = htmlentities($value);
            }
        }

        if ($this->addContact($name, $email, $phone, $subject, $message, $customer) == 1) {

            // Succes
            $this->insertLog('Contact', 'Add', 'Added message to database, message not sent yet');

            // Set variables
            $mailFrom = $email;
            $mailReplyTo = $email;
            $mailTo = 'sales@universalelectro.nl';
            $mailSubject = $subject;
            $mailMessage = $message."\r\n"."\r\n".'Contact information: '."\r\n".'Reply to '.$mailReplyTo."\r\n".'Phone: '.$phone;

            $mailHeaders = ['From' => $mailFrom,
                            'Reply-To' => $mailReplyTo];

            // Sent mail    
            if (mail($mailTo, $mailSubject, $mailMessage, $mailHeaders)) {
                
                // Message sent succesfully
                $this->insertLog('Contact', 'Send', 'Message sent succesfully by '.$name);
                
            } else {

                // Failed to sent message
                $this->insertLog('Contact', 'Send', 'Failed to sent message by '.$name.' ('.$email.', '.$phone.': '.$message.')');
            }
        
        } else {

            // Failed
            $this->insertLog('Contact', 'Add', 'Adding message from '.$name.' ('.$email.', '.$phone.': '.$message.') failed');
        }
    }

    /**
     * Add ticket
     */
    public function addTicket() : void
    {
        // Set required $_POST fields
        $this->setReq('subject', 'message', 'category', 'priority');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Tickets', 'Add', 'Adding ticket through web failed, not al required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                $$key = htmlentities($value);
            }
        }

        $notification = 0;
        if (isset($_POST['notification']) && $_POST['notification'] == 1) {
            $notification = 1;
        }

        // Get initial ticket status
        $settings = $this->getTicketSettings();

        // Add ticket
        if ($this->addTickets($_SESSION['webuser'], $settings['initial_status'], $subject, $category, $priority, $notification) == 1) {

            // Get ticket
            $ticket = $this->lastTicketByCustomerAndSubject($_SESSION['webuser'], $subject);

            // Succes
            $this->insertLog('Tickets', 'Add', 'Added ticket ('.$ticket['id'].') through web, message not sent yet');

            // Upload file

            // Check if file is being uploaded
            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != null) {

                // File naming
                $path = 'includes/ticketfiles/';
                $file = basename($_FILES['file']['name']);
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                
                // Accepted files
                $acceptedFileTypes = $GLOBALS['acceptedFileTypes'];
            
                // Check if file exists
                // If exists, rename with number added
                $base = $filename;
                
                // Continue numbering until unique name is found
                for ($i = 1; file_exists($path.$filename.'.'.$extension); $i++) {
                    $filename = $base.$i;
                }

                // Check if file is accepted file type
                if (in_array($extension, $acceptedFileTypes)) {

                    // Set destination path
                    $filepath = $path.$filename.'.'.$extension;

                    // Upload file
                    if (!move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
                        
                        // File upload failed
                        $filesError = null;
                        foreach($_FILES as $value) {
                            foreach ($value as $value2) {
                                $filesError = $filesError.$value2.' ';
                            }
                        }

                        // Insert log
                        $this->insertLog('Tickets message', 'Add', 'Adding file to ticket failed, file upload error: '.$filesError);
                    }

                    // File has the wrong type, insert error in log
                } else {

                    $this->insertLog('Tickets message', 'Add', 'Adding file to ticket failed, file was the wrong type');
                }

            // No image uploaded, set filepath null
            } else {

                $filepath = null;
            }

            // Insert message
            if ($this->addTicketMessage($ticket['id'], $_SESSION['webuser'], $message, $filepath) == 1) {

                // Succes
                $this->insertLog('Tickets message', 'Add', 'Added ticket message to ticket '.$ticket['id'].'. New ticket successful');

            } else {

                // Failed
                $this->insertLog('Tickets message', 'Add', 'Adding ticket message to ticket '.$ticket['id'].' failed');
            }

        } else {

            // Failed
            $this->insertLog('Tickets', 'Add', 'Adding ticket through web failed, not sending message');
        }
    }

    /**
     * Add ticket reply
     */
    public function ticketReply() : void
    {
        // Set required $_POST fields
        $this->setReq('message');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Tickets message', 'Add', 'Adding ticket message through web failed, not al required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Upload file

        // Check if file is being uploaded
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != null) {

            // File naming
            $path = 'includes/ticketfiles/';
            $file = basename($_FILES['file']['name']);
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            
            // Accepted files
            $acceptedFileTypes = $GLOBALS['acceptedFileTypes'];
        
            // Check if file exists
            // If exists, rename with number added
            $base = $filename;
            
            // Continue numbering until unique name is found
            for ($i = 1; file_exists($path.$filename.'.'.$extension); $i++) {
                $filename = $base.$i;
            }

            // Check if file is accepted file type
            if (in_array($extension, $acceptedFileTypes)) {

                // Set destination path
                $filepath = $path.$filename.'.'.$extension;

                // Upload file
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
                    
                    // File upload failed
                    $filesError = null;
                    foreach($_FILES as $value) {
                        foreach ($value as $value2) {
                            $filesError = $filesError.$value2.' ';
                        }
                    }

                    // Insert log
                    $this->insertLog('Tickets message', 'Add', 'Adding file to ticket failed, file upload error: '.$filesError);
                }

                // File has the wrong type, insert error in log
            } else {

                $this->insertLog('Tickets message', 'Add', 'Adding file to ticket failed, file was the wrong type');
            }

        // No image uploaded, set filepath null
        } else {

            $filepath = null;
        }

        // Get account
        $account = $q->getCustomer($_SESSION['webuser']);

        // Get ticket
        $ticket = $q->getCMSTicket($id);

        // Get ticket category
        $category = $q->getTicketCategory($ticket['category']);

        if ($category['notification'] == true) {

            // Check if the email adress is valid
            if (filter_var($account['email'], FILTER_VALIDATE_EMAIL)) {
                
                // Set variables
                $mailFrom = 'tickets@universalelectro.nl';
                $mailReplyTo = $account['email'];
                $mailTo = $category['email'];
                $mailSubject = 'Nieuw ticket van '.$account['lastname'].', '.$account['firstname'].' '.$account['insertion'];
                $mailMessage = 'Nieuw ticket van '.$account['lastname'].', '.$account['firstname'].' '.$account['instertion'].':'."\r\n"."\r\n";
                $mailMessage = $message."\r\n"."\r\n";
                $mailMessage = 'Ga naar bericht: https://universalelectro.nl/admin/index.php?page=1&action=2';

                // Loop through quotation products
                foreach($products as $productKey => $productValue) {

                    // Get product info
                    $product = $q->getProductById($productValue['product']);

                    // Get brand info
                    $brand = $q->getBrandById($product['brand']);

                    $mailMessage .= '- '.$brand['name'].': ('.$product['amount'].'x) '.$product['name']."\r\n";
                }

                if (isset($account['remarks']) && $account['remarks'] != null) {
                    $mailMessage .= 'Opmerking: '."\r\n"; 
                    $mailMessage .= $account['remarks'];
                }

                $mailHeaders = ['From' => $mailFrom,
                                'Reply-To' => $mailReplyTo];

                if (!mail($mailTo, $mailSubject, $mailMessage, $mailHeaders)) {

                    // Error sending mail
                    $this->insertLog('Tickets', 'Add', 'No email sent, error during sending email');
                }
            
            } else {

                // No email sent
                $this->insertLog('Tickets', 'Add', 'No email sent, user '.$account['lastname'].', '.$account['firstname'].' '.$account['insertion'].' ('.$_SESSION['webuser'].') has an invalid email adres');
            }

        } else {

            // No email sent, turned off in settings
            $this->insertLog('Tickets', 'Add', 'No email sent, turned off in settings');
        }

        // Insert message
        if ($this->addTicketMessage($id, $_SESSION['webuser'], $message, $filepath) == 1) {

            // Succes
            $this->insertLog('Tickets message', 'Add', 'Added ticket message to ticket '.$id.'. Status not updated yet');

            // Get account
            $account = $q->getCustomer($_SESSION['webuser']);

            // Get ticket
            $ticket = $q->getCMSTicket($id);

            // Get ticket category
            $category = $q->getTicketCategory($ticket['category']);

            if ($category['notification'] == true) {

                // Check if the email adress is valid
                if (filter_var($account['email'], FILTER_VALIDATE_EMAIL)) {
                    
                    // Set variables
                    $mailFrom = 'tickets@universalelectro.nl';
                    $mailReplyTo = $account['email'];
                    $mailTo = $category['email'];
                    $mailSubject = 'Nieuw bericht in het ticket van '.$account['lastname'].', '.$account['firstname'].' '.$account['insertion'];
                    $mailMessage = 'Nieuw bericht in het ticket van '.$account['lastname'].', '.$account['firstname'].' '.$account['instertion'].':'."\r\n"."\r\n";
                    $mailMessage = $message."\r\n"."\r\n";
                    $mailMessage = 'Ga naar bericht: https://localhost/UniversalElectro/admin/index.php?page=1&action=2';

                    // Loop through quotation products
                    foreach($products as $productKey => $productValue) {

                        // Get product info
                        $product = $q->getProductById($productValue['product']);

                        // Get brand info
                        $brand = $q->getBrandById($product['brand']);

                        $mailMessage .= '- '.$brand['name'].': ('.$product['amount'].'x) '.$product['name']."\r\n";
                    }

                    if (isset($account['remarks']) && $account['remarks'] != null) {
                        $mailMessage .= 'Opmerking: '."\r\n"; 
                        $mailMessage .= $account['remarks'];
                    }

                    $mailHeaders = ['From' => $mailFrom,
                                    'Reply-To' => $mailReplyTo];

                    if (!mail($mailTo, $mailSubject, $mailMessage, $mailHeaders)) {

                        // Error sending mail
                        $this->insertLog('Tickets', 'Edit', 'No email sent, error during sending email');
                    }
                
                } else {

                    // No email sent
                    $this->insertLog('Tickets', 'Edit', 'No email sent, user '.$account['lastname'].', '.$account['firstname'].' '.$account['insertion'].' ('.$_SESSION['webuser'].') has an invalid email adres');
                }

            } else {

                // No email sent, turned off in settings
                $this->insertLog('Tickets', 'Edit', 'No email sent, turned off in settings');
            }

            // Update status
            if ($this->setTicketStatus(7, $id) == 1) {

                // Succes
                $this->insertLog('Tickets', 'Edit', 'Changed status of ticket '.$id.' to 7');
            
            } else {

                // Failed
                $this->insertLog('Tickets', 'Edit', 'Status of ticket '.$id.' not changed, possible wrong display of status');
            }

        } else {

            // Failed
            $this->insertLog('Tickets message', 'Add', 'Adding ticket message to ticket '.$id.' failed');
        }
    }

    /**
     * Add product to cart
     */
    public function addtocart() : void
    {
        // Set required $_POST fields
        $this->setReq('id', 'amount');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Quotation', 'Add', 'Adding quotation through web failed, not al required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Set customer id
        $customer = null;
        if (isset($_SESSION['webuser']) && $_SESSION['webuser'] != null) {
            $customer = $_SESSION['webuser'];
        }

        // Count open quotations from cookie session
        if ($this->countOpenQuotationsFromSession($_COOKIE['unele_shop']) == 1) {

            // Quotation is open, add products to existing quotation
            
            // Get quotation
            $quote = $this->getLatestQuotationFromSession($_COOKIE['unele_shop']);

            // Check if product is already in cart
            if ($this->countQuotationProduct($id, $quote['id']) == 1) {

                // Update product amount, add new amount to the new amount

                // Get existing amount
                $productQuote = $this->getQuotationProduct($id, $quote['id']);

                // Calculate new amount
                $oldAmount = $productQuote['amount'];
                $newAmount = $oldAmount + $amount;

                // Update amount
                if ($this->editQuotationProductAmount($newAmount, $id, $quote['id']) == 1) {

                    // Succes
                    $this->insertLog('Quotation products', 'Edit', 'Updated product '.$id.' amount from quotation '.$quote['id']);
                
                } else {

                    $this->insertLog('Quotation products', 'Edit', 'Updating product '.$id.' amount failed in quotation '.$quote['id']);
                }
            
            } else {

                // New product, insert

                // Add product to quotation
                if ($this->addQuotationProduct($quote['id'], $id, $amount) == 1) {

                    // Succes
                    $this->insertLog('Quotation products', 'Add', 'Added product '.$id.' to quotation '.$quote['id']);

                } else {

                    // Failed
                    $this->insertLog('Quotation products', 'Add', 'Product '.$id.' not added to quotation '.$quote['id']);
                }
            }
        
        } else {

            // No open quotations, start a new one
            if ($this->addQuotation($customer, $_SERVER['REMOTE_ADDR'], $_COOKIE['unele_shop'], 1) == 1) {

                // Get quotation
                $quote = $this->getLatestQuotationFromSession($_COOKIE['unele_shop']);

                // Succes
                $this->insertLog('Quotation', 'Add', 'Quotation added ('.$quote['id'].')');

                // Add product to quotation
                if ($this->addQuotationProduct($quote['id'], $id, $amount) == 1) {

                    // Succes
                    $this->insertLog('Quotation products', 'Add', 'Added product '.$id.' to quotation '.$quote['id']);

                } else {

                    // Failed
                    $this->insertLog('Quotation products', 'Add', 'Product '.$id.' not added to quotation '.$quote['id']);
                }
            
            } else {

                // Failed
                $this->insertLog('Quotation', 'Add', 'Quotation failed to add');
            }
        }
    }

    /**
     * Update product amounts of cart
     */
    public function updatecart() : void
    {

        // Get shopping cart id
        $cart = $this->getLatestQuotationFromSession($_COOKIE['unele_shop']);

        // Loop through al POSTed fields
        foreach($_POST as $key => $value) {
            
            // Skip 'form' post field
            if ($key != 'form') {
                
                $hKey = htmlentities($key);
                $hValue = htmlentities($value);

                // Check if value is to be deleted or updated
                if ($hValue == 0) {

                    // Delete product from quotation
                    if ($this->deleteQuotationProduct($hKey, $cart['id']) == 1) {

                        // Succes
                        $this->insertLog('Quotation products', 'Delete', 'Deleted product '.$hKey.' from quotation '.$cart['id']. ' through webshop cart update');
                    
                    } else {

                        // Failed
                        $this->insertLog('Quotation products', 'Delete', 'Deleting product '.$hKey.' from quotation '.$cart['id']. ' failed through webshop cart update');
                    }

                } else {

                    // Update product amount in quotation
                    if ($this->editQuotationProductAmount($hValue, $hKey, $cart['id']) == 1) {

                        // Succes
                        $this->insertLog('Quotation products', 'Edit', 'Updated product '.$hKey.' amount from quotation '.$cart['id'].' through webshop cart update');

                    } else {

                        // Failed
                        $this->insertLog('Quotation products', 'Edit', 'Updating product '.$hKey.' amount from quotation '.$cart['id']. ' failed through webshop cart update');
                    }
                }
            }
        }
    }
}