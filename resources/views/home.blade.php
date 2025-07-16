@extends('layout.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="contaier">
        <h1 class="text-center">
            Testing The Header
        </h1>
        <p class="w-50 mx-auto mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, expedita. Delectus libero, quod doloribus repellat expedita nemo nobis voluptates magni ea alias aut. Laborum molestias nostrum enim blanditiis dolores est.
        </p>
    </div>

    <!-- Modal Structure -->
<div class="modal fade flashback-modal" id="flashbackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <div class="modal-icon">
                        <i class="bi"></i>
                    </div>
                    <h5 class="modal-title"></h5>
                </div>
            </div>
            <div class="modal-body">
                <p class="message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showFlashback(type, title, message, options = {}) {
        const modal = new bootstrap.Modal(document.getElementById('flashbackModal'));
        const modalElement = document.getElementById('flashbackModal');
        const modalIcon = modalElement.querySelector('.modal-icon i');
        const modalTitle = modalElement.querySelector('.modal-title');
        const modalMessage = modalElement.querySelector('.message');
        
        // Reset classes
        modalElement.classList.remove('success', 'warning', 'error');
        
        // Set type-specific styling and content
        switch(type) {
            case 'success':
                modalElement.classList.add('success');
                modalIcon.className = 'bi bi-check-circle-fill';
                break;
            case 'warning':
                modalElement.classList.add('warning');
                modalIcon.className = 'bi bi-exclamation-triangle-fill';
                break;
            case 'error':
                modalElement.classList.add('error');
                modalIcon.className = 'bi bi-x-circle-fill';
                break;
        }
        
        // Set content
        modalTitle.textContent = title;
        modalMessage.textContent = message;
        
        // Additional options
        if (options.autoClose) {
            setTimeout(() => {
                modal.hide();
                if (options.callback) options.callback();
            }, options.duration || 3000);
        }
        
        // Show modal
        modal.show();
        
        // Handle hidden event
        modalElement.addEventListener('hidden.bs.modal', function() {
            if (options.callback && !options.autoClose) options.callback();
        });
    }

    // Example usage:
    // showFlashback('success', 'Success!', 'Your action was completed successfully.', {
    //     autoClose: true,
    //     duration: 2000,
    //     callback: () => console.log('Modal closed')
    // });
</script>
@endsection