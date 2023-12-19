<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <link rel="stylesheet" href="../assets/css/98.css">
</head>

<body>

    <h2>Add Subject</h2>
    <form id="addSubjectForm">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="minimumPricing">Minimum Pricing:</label>
        <input type="text" id="minimumPricing" name="minimumPricing" required><br>

        <button type="button" onclick="addSubject()">Add Subject</button>
    </form>

    <hr>

    <h2>Subjects</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Minimum Pricing</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="subjectTableBody">
        </tbody>
    </table>

    <script>
        function addSubject() {
            var name = document.getElementById('name').value;
            var description = document.getElementById('description').value;
            var minimumPricing = document.getElementById('minimumPricing').value;

            $.ajax({
                type: 'POST',
                url: '../Routes/Subject/add_subject.php',
                data: {
                    name: name,
                    description: description,
                    minimumPricing: minimumPricing
                },
                success: function(response) {
                    console.log(response);
                    if (response === 'success') {
                        alert('Subject added successfully!');
                        loadSubjects();
                    } else {
                        alert('Failed to add subject. Please try again.');
                    }
                }
            });
        }

        function deleteSubject(subjectId) {
            $.ajax({
                type: 'POST',
                url: '../Routes/Subject/delete_subject.php',
                data: {
                    id: subjectId
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Subject deleted successfully!');
                        loadSubjects();
                    } else {
                        alert('Failed to delete subject. Please try again.');
                    }
                }
            });
        }

        function loadSubjects() {
            $.ajax({
                type: 'GET',
                url: '../Routes/Subject/get_subjects.php',
                success: function(response) {
                    $('#subjectTableBody').html(response);
                }
            });
        }

        loadSubjects();
    </script>

</body>

</html>