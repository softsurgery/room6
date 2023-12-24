<div class="window closed" data-title="Subjects" m-width="300px" m-height="350px" togglemax="true">

        <form>
            <fieldset>
                <legend>
                    <h1>Add Subject</h1>
                </legend>
                <div class="field-row-stacked">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br>
                </div>
                <div class="field-row-stacked">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="8" required></textarea>
                </div>

                <div class="field-row-stacked">
                    <label for="minimumPricing">Minimum Pricing:</label>
                    <input type="text" id="minimumPricing" name="minimumPricing" required>
                </div>

                <br>
                <div class="field-row-stacked">
                    <button type="button" onclick="addSubject()">Add Subject</button>
                </div>

            </fieldset>
        </form>

    <script>
        function addSubject() {
            var name = document.getElementById('name').value;
            var description = document.getElementById('description').value;
            var minimumPricing = document.getElementById('minimumPricing').value;

            $.ajax({
                type: 'POST',
                url: '/Routes/Subject/add_subject.php',
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
                url: '/Routes/Subject/delete_subject.php',
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
                url: '/Routes/Subject/get_subjects.php',
                success: function(response) {
                    $('#subjectTableBody').html(response);
                }
            });
        }

        loadSubjects();
    </script>
</div>