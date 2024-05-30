// Initialize variables
let editFormateurId = null;

// Function to open the edit form modal
function openEditFormateurModal(id) {
    editFormateurId = id;
    // Fetch formateur data based on the provided id and populate the modal fields
    // Use AJAX request or any other method to fetch formateur data
    // Example:
    // fetch(`/formateurs/${id}`)
    //     .then(response => response.json())
    //     .then(data => {
    //         // Populate modal fields with data
    //         document.getElementById('edit_Username').value = data.Username;
    //         document.getElementById('edit_email').value = data.email;
    //         document.getElementById('edit_course_type').value = data.course_type;
    //         document.getElementById('edit_telephone').value = data.telephone;
    //         document.getElementById('edit_cin').value = data.cin;
    //         document.getElementById('edit_course_code').value = data.course_code;
    //     })
    //     .catch(error => console.error('Error fetching formateur data:', error));

    // For demonstration purposes, let's assume we directly populate the fields
    const formateur = {
        Username: 'John Doe',
        email: 'john.doe@example.com',
        course_type: 'Mathematics',
        telephone: '1234567890',
        cin: '123456789',
        course_code: 'MATH101'
    };
    document.getElementById('edit_Username').value = formateur.Username;
    document.getElementById('edit_email').value = formateur.email;
    document.getElementById('edit_course_type').value = formateur.course_type;
    document.getElementById('edit_telephone').value = formateur.telephone;
    document.getElementById('edit_cin').value = formateur.cin;
    document.getElementById('edit_course_code').value = formateur.course_code;

    // Open the modal
    $('#editFormateurModal').modal('show');
}

// Function to update formateur data
function updateFormateur() {
    if (editFormateurId) {
        // Get updated formateur data from modal fields
        const updatedFormateur = {
            Username: document.getElementById('edit_Username').value,
            email: document.getElementById('edit_email').value,
            course_type: document.getElementById('edit_course_type').value,
            telephone: document.getElementById('edit_telephone').value,
            cin: document.getElementById('edit_cin').value,
            course_code: document.getElementById('edit_course_code').value
        };
        // Use AJAX request or any other method to update formateur data
        // Example:
        // fetch(`/formateurs/${editFormateurId}`, {
        //     method: 'PUT',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify(updatedFormateur)
        // })
        // .then(response => response.json())
        // .then(data => {
        //     // Handle response
        //     console.log('Formateur updated successfully:', data);
        //     // Optionally, update UI or close modal
        // })
        // .catch(error => console.error('Error updating formateur:', error));

        // For demonstration purposes, let's assume we log the updated formateur data
        console.log('Updated Formateur:', updatedFormateur);

        // Close the modal
        $('#editFormateurModal').modal('hide');
    }
}

// Add event listeners for edit buttons
document.querySelectorAll('.edit-formateur').forEach(button => {
    button.addEventListener('click', () => {
        const formateurId = button.getAttribute('data-id');
        openEditFormateurModal(formateurId);
    });
});

// Add event listener for edit form submit
document.getElementById('editFormateurForm').addEventListener('submit', event => {
    event.preventDefault();
    updateFormateur();
});
