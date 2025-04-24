document.addEventListener('DOMContentLoaded', function() {
    // Handle image deletion
    document.querySelectorAll('.delete-image-btn').forEach(button => {
        button.addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this image?')) {
                const imageId = this.dataset.imageId;
                const deleteUrl = this.dataset.deleteUrl;
                
                // Create form data
                const formData = new FormData();
                formData.append('image_id', imageId);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                // Send delete request
                fetch(deleteUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the image container from the DOM
                        this.closest('.existing-image-container').remove();
                    } else {
                        alert('Failed to delete image. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the image.');
                });
            }
        });
    });
}); 