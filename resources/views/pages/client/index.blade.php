<x-app-layout>
    <div class="w-full h-screen mx-auto">
        <div class="bg-white h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
            <livewire:client-table />
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const allClientCheckbox = document.getElementById('all-client-checkbox');
            const clientCheckboxes = document.querySelectorAll('.client-checkbox');
            const bulkActions = document.getElementById('bulk-actions');
            const nameHead = document.getElementById('name_head');

            function updateBulkActionsVisibility() {
                const anyChecked = document.querySelectorAll('.client-checkbox:checked').length > 0;
                if(anyChecked) {
                    bulkActions.style.display = 'block';
                    nameHead.style.display = 'none';
                } else {
                    bulkActions.style.display = 'none';
                    nameHead.style.display = 'block';
                }
            }

            function addIndicator(checkbox) {
                const indicator = document.createElement('div');
                indicator.className = 'absolute inset-y-0 left-0 w-0.5 bg-indigo-600';
                checkbox.parentElement.insertBefore(indicator, checkbox);
            }

            function removeIndicator(checkbox) {
                const indicator = checkbox.parentElement.querySelector('.absolute');
                if (indicator) {
                    indicator.remove();
                }
            }

            allClientCheckbox.addEventListener('change', function () {
                clientCheckboxes.forEach(checkbox => {
                    checkbox.checked = allClientCheckbox.checked;
                    if (allClientCheckbox.checked) {
                        addIndicator(checkbox);
                    } else {
                        removeIndicator(checkbox);
                    }
                });
                updateBulkActionsVisibility();
            });

            clientCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                        addIndicator(checkbox);
                    } else {
                        removeIndicator(checkbox);
                    }
                    updateBulkActionsVisibility();

                    // Update allClientCheckbox state
                    allClientCheckbox.checked = document.querySelectorAll('.client-checkbox:checked').length === clientCheckboxes.length;
                });
            });

            // Deletion function
            bulkActions.querySelector('button').addEventListener('click', function () {
                const selectedClientIds = Array.from(document.querySelectorAll('.client-checkbox:checked'))
                    .map(checkbox => checkbox.closest('tr').dataset.clientId);

                if (selectedClientIds.length > 0) {
                    // Confirm deletion
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.post('{{ route("clients.bulk_delete") }}', {
                                ids: selectedClientIds
                            }, {
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                            })
                            .then(response => {
                                Swal.fire(
                                    'Deleted!',
                                    'The selected clients have been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload(); // Reload the page to reflect changes
                                });
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Error!',
                                    'There was an error deleting the clients. Please try again.',
                                    'error'
                                );
                            });
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
