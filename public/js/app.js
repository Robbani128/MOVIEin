document.addEventListener('DOMContentLoaded', function() {
    // Delete Confirmation using SweetAlert2
    const deleteForms = document.querySelectorAll('.delete-form');
    
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e50914',
                cancelButtonColor: '#444',
                confirmButtonText: 'Yes, delete it!',
                background: '#1f1f1f',
                color: '#fff'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
});
