@if(session()->get('alert') !== null)
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1000">
        <div class="toast align-items-center text-bg-{{session()->get('alert')[0]['color']}} border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{session()->get('alert')[0]['text']}}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@php
    session()->forget('alert')
@endphp



