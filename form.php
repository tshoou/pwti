<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Form Input</title>
</head>
<body>
    <div class="h-screen container mb-5">
        <h1 class="text-center my-2">Form Input</h1>
        <div class=" w-50">
            <form id="form_id">
                <div class="mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" class="form-control" id="number" aria-describedby="numberHelp" name="number" required>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <input type="text" class="form-control" id="text" name="text" required>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>
        </div>
        <div class="mt-5">
            <table id="table-data" class="table table-light table-striped">
                <thead>
                    <tr>    
                        <th>Index</th>
                        <th>Text</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
       $(document).ready(function() {
       $('#form_id').submit(function(event) {
        event.preventDefault(); // prevent default form submission

        $.ajax({
            url: 'script.php',
            method: 'POST',
            data: $(this).serialize(), // serialize form data
            dataType: 'json', // add dataType to specify JSON response
            success: function(data) {
                console.log(data);
                let tableData = ''; // create empty table data

                // loop through array to create table rows
                $.each(data, function(index, value) {
                    tableData += '<tr><td>' + (index + 1) + '</td><td>' + value + '</td></tr>';
                });

                // append table data to table body and show table with animation
                $('#table-data tbody').html(tableData).hide().fadeIn('slow');
            }
        });
    });
});

</script>
</body>
</html>
