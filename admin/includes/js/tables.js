/**
 * This function creates table pagination on large tables
 */

 function tables(clickedButton = null) {
    // Set variables
    var table = document.getElementById('paginate');
    var rowCount = table.rows.length;
    var pagebuttons = document.getElementById('pagebuttons');

    // Check if page button is clicked
    if (clickedButton != null) {
    
        var row = 1;

        // Function to return row element or false if null
        function getRow(rownum) {
        
            var row = document.getElementById('row' + rownum);
        
            if(row != null) {
        
                return row;
        
            }
        
            return false;
        }

        // Function to combine true check
        function whileFunc(row) {
            if(row != null && row.style.display == 'none') {
                return true;
            }
            return false;
        }
        
        // Check which group is displaying right now
        while(whileFunc(getRow(row))) {
            row += 10;
        }

        switch(clickedButton) {
            case 'first':

                // Hide everything after row 10
                for(var i = 11; i < rowCount; i++) {

                    var row = document.getElementById('row' + i);
                    
                    if (row != null) {
                        row.style.display = 'none';
                    }
                }

                // Display first rows
                for(var i = 1; i < 11; i++) {

                    var row = document.getElementById('row' + i);
                    
                    if (row != null) {
                        row.style.display = '';
                    }
                }

                break;
            
            case 'previous':

                var endRow = row + 9;
                var newStartRow = row - 10;
                var newEndRow = row; // + 1 needed for hiding table after the endrow

                // Check if not already on first page
                if (row != 1) {

                    // Hide everything after new current row
                    for(var i = newEndRow; i < rowCount; i++) {

                        var row = document.getElementById('row' + i);
                        
                        if (row != null) {
                            row.style.display = 'none';
                        }
                    }

                    // Check if new display row is first
                    if (newStartRow != 1) {

                        // Hide everything before new row
                        for(var i = 1; i < newStartRow; i++) {

                            var row = document.getElementById('row' + i);
                            
                            if (row != null) {
                                row.style.display = 'none';
                            }
                        }
                    }

                    // Display new rows
                    for(var i = newStartRow; i < newEndRow; i++) {

                        var row = document.getElementById('row' + i);
                        
                        if (row != null) {
                            row.style.display = '';
                        }
                    }
                }

                break;

            case 'next':

                var endRow = row + 9;
                var newStartRow = row + 10;
                var newEndRow = row + 20; // + 1 needed for hiding table after the endrow

                // Check if current row is not the last row
                if (endRow <= rowCount) {

                    // Hide everything before new row
                    for(var i = 1; i <= endRow; i++) {

                        var row = document.getElementById('row' + i);
                        
                        if (row != null) {
                            row.style.display = 'none';
                        }
                    }

                    // Check if new display row is last
                    if (newStartRow <= rowCount) {

                        // Hide everything after new row
                        for(var i = newEndRow; i < rowCount; i++) {

                            var row = document.getElementById('row' + i);
                            
                            if (row != null) {
                                row.style.display = 'none';
                            }
                        }
                    }

                    // Display new rows
                    for(var i = newStartRow; i < newEndRow; i++) {

                        var row = document.getElementById('row' + i);
                        
                        if (row != null) {
                            row.style.display = '';
                        }
                    }
                }

                break;

            case 'last':

                // Calculate last page start
                var totalPages = Math.floor(rowCount / 10);
                var lastPageStart = totalPages * 10 + 1;
                var endRow = row + 9;

                // Check if current row is not the last row
                if (endRow <= rowCount) {

                    // Hide everything before new row
                    for(var i = 1; i <= endRow; i++) {

                        var row = document.getElementById('row' + i);
                        
                        if (row != null) {
                            row.style.display = 'none';
                        }
                    }
                    
                    // Display new rows
                    for(var i = lastPageStart; i < rowCount; i++) {

                        var row = document.getElementById('row' + i);
                        
                        if (row != null) {
                            row.style.display = '';
                        }
                    }

                }

                break;
        }

    } else {
        console.log(rowCount);
        // Check if there are more then 10 rows
        if (rowCount > 11) {

            // Hide everything after row 10
            for(var i = 11; i < rowCount; i++) {

                var row = document.getElementById('row' + i);
                
                if (row != null) {
                    row.style.display = 'none';
                }
            }

            // Display page buttons
            var button = document.createElement('div');
            button.setAttribute('class', 'pagebutton');
            button.setAttribute('onclick', 'tables("first")');
            button.setAttribute('id', 'first');
            button.innerHTML = 'First';
            pagebuttons.append(button);
            var button = document.createElement('div');
            button.setAttribute('class', 'pagebutton');
            button.setAttribute('onclick', 'tables("previous")');
            button.setAttribute('id', 'previous');
            button.innerHTML = 'Previous';
            pagebuttons.append(button);
            var button = document.createElement('div');
            button.setAttribute('class', 'pagebutton');
            button.setAttribute('onclick', 'tables("next")');
            button.setAttribute('id', 'next');
            button.innerHTML = 'Next';
            pagebuttons.append(button);
            var button = document.createElement('div');
            button.setAttribute('class', 'pagebutton');
            button.setAttribute('onclick', 'tables("last")');
            button.setAttribute('id', 'last');
            button.innerHTML = 'Last';
            pagebuttons.append(button);
            
        }
    }
}

window.onload = function() {
    tables();
}