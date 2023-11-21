// form-validation.js

document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('eventForm');

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetching form elements
        var form = document.querySelector('form[name="eventForm"]');
        var eventNameInput = document.querySelector('input[name="name"]');
        var startTimeInput = document.querySelector('input[name="startTime"]');
        var endTimeInput = document.querySelector('input[name="endTime"]');
        var locationInput = document.querySelector('input[name="location"]');
        var descriptionInput = document.querySelector('textarea[name="description"]');
        var registrationDeadlineInput = document.querySelector('input[name="registrationDeadline"]');
        var organisationSelect = document.querySelector('select[name="organisation"]');
        var categorySelect = document.querySelector('select[name="category"]');

        form.addEventListener('submit', function (event) {
            // Perform basic validation
            var isValid = true;

            // Check if event name is empty
            if (eventNameInput.value.trim() === '') {
                alert('Event Name cannot be empty');
                isValid = false;
            }

            // Check if start time is empty
            if (startTimeInput.value.trim() === '') {
                alert('Start Time cannot be empty');
                isValid = false;
            }

            // Check if end time is empty
            if (endTimeInput.value.trim() === '') {
                alert('End Time cannot be empty');
                isValid = false;
            }

            // Check if location is empty
            if (locationInput.value.trim() === '') {
                alert('Location cannot be empty');
                isValid = false;
            }

            // Check if description is empty
            if (descriptionInput.value.trim() === '') {
                alert('Description cannot be empty');
                isValid = false;
            }

            // Check if registration deadline is empty
            if (registrationDeadlineInput.value.trim() === '') {
                alert('Registration Deadline cannot be empty');
                isValid = false;
            }

            // Check if organisation is not selected
            if (organisationSelect.value === 'Please Select an organisation') {
                alert('Please select an organisation');
                isValid = false;
            }

            // Check if category is not selected
            if (categorySelect.value === 'Please Select a category') {
                alert('Please select a category');
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>

});
