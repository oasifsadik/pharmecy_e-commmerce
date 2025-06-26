@extends('doctors.master')

@section('admintitle')
    Chat with Patients
@endsection

@section('dashboardContent')
@include('doctors.layout.slidebar')
@include('doctors.layout.navbar')
@include('admin.layout.rightbar')

{{-- <style>
    .chat-container {
        display: flex;
        flex-wrap: wrap;
        height: 80vh;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .chat-sidebar {
        width: 25%;
        min-width: 220px;
        border-right: 1px solid #dee2e6;
        overflow-y: auto;
        background: #f9fafb;
    }

    .chat-sidebar .patient {
        padding: 15px 20px;
        cursor: pointer;
        border-bottom: 1px solid #e9ecef;
        transition: background 0.2s;
    }

    .chat-sidebar .patient:hover,
    .chat-sidebar .active {
        background-color: #e0f7fa;
        font-weight: 600;
    }

    .chat-messages {
        width: 50%;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
        background: #ffffff;
        border-right: 1px solid #dee2e6;
    }

   .chat-box {
        flex: 1;
        overflow-y: auto; /* Ensures that overflow content becomes scrollable */
        margin-bottom: 15px;
        padding-right: 10px;
        height: 300px; /* Set a fixed height to make scrolling possible */
        max-height: 80vh; /* Optionally limit the height based on viewport */
    }


    .chat-message {
        margin-bottom: 12px;
        padding: 10px 15px;
        border-radius: 12px;
        max-width: 75%;
        word-wrap: break-word;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .chat-message.sent {
        background: #d1e7dd;
        align-self: flex-end;
    }

    .chat-message.received {
        background: #f8d7da;
        align-self: flex-start;
    }

    form.d-flex {
        display: flex;
        gap: 10px;
    }

    .chat-files {
        width: 25%;
        min-width: 220px;
        padding: 20px;
        background: #f1f3f5;
        overflow-y: auto;
    }

    .chat-files h6 {
        margin-bottom: 15px;
        font-weight: 600;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .chat-files img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 6px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }

    .file-link {
        display: block;
        margin-bottom: 8px;
        color: #007bff;
        text-decoration: none;
        word-break: break-word;
    }

    .file-link:hover {
        text-decoration: underline;
    }

    #videoCallBtn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    #videoCallBtn:hover {
        background-color: #c8f7c5;
        color: #155724;
    }

    @media (max-width: 768px) {
        .chat-container {
            flex-direction: column;
            height: auto;
        }
        .chat-sidebar, .chat-messages, .chat-files {
            width: 100%;
            min-width: 100%;
            border-right: none;
            border-bottom: 1px solid #dee2e6;
        }
        .chat-messages {
            border-bottom: none;
        }
    }
</style> --}}
<style>
    .chat-container {
        display: flex;
        flex-wrap: wrap;
        height: 80vh;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .chat-sidebar {
        width: 25%;
        min-width: 220px;
        border-right: 1px solid #dee2e6;
        overflow-y: auto;
        background: #f9fafb;
    }

    .chat-sidebar .patient {
        padding: 15px 20px;
        cursor: pointer;
        border-bottom: 1px solid #e9ecef;
        transition: background 0.2s;
    }

    .chat-sidebar .patient:hover,
    .chat-sidebar .active {
        background-color: #e0f7fa;
        font-weight: 600;
    }

    .chat-messages {
        width: 50%;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
        background: #ffffff;
        border-right: 1px solid #dee2e6;
    }

    .chat-box {
        flex: 1;
        overflow-y: auto;
        margin-bottom: 15px;
        padding-right: 10px;
        height: 300px; /* Ensure the chat box has a fixed height */
        max-height: 50vh; /* Optional: limit the height to 80% of the viewport */
    }

    .chat-message {
        margin-bottom: 12px;
        padding: 10px 15px;
        border-radius: 12px;
        max-width: 75%;
        word-wrap: break-word;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .chat-message.sent {
        background: #d1e7dd;
        align-self: flex-end;
    }

    .chat-message.received {
        background: #f8d7da;
        align-self: flex-start;
    }

    form.d-flex {
        display: flex;
        gap: 10px;
    }

    .chat-files {
        width: 25%;
        min-width: 220px;
        padding: 20px;
        background: #f1f3f5;
        overflow-y: auto;
    }

    .chat-files h6 {
        margin-bottom: 15px;
        font-weight: 600;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .chat-files img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 6px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }

    .file-link {
        display: block;
        margin-bottom: 8px;
        color: #007bff;
        text-decoration: none;
        word-break: break-word;
    }

    .file-link:hover {
        text-decoration: underline;
    }

    #videoCallBtn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    #videoCallBtn:hover {
        background-color: #c8f7c5;
        color: #155724;
    }

    @media (max-width: 768px) {
        .chat-container {
            flex-direction: column;
            height: auto;
        }
        .chat-sidebar, .chat-messages, .chat-files {
            width: 100%;
            min-width: 100%;
            border-right: none;
            border-bottom: 1px solid #dee2e6;
        }
        .chat-messages {
            border-bottom: none;
        }
    }
</style>
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-chatbubbles-outline"></i>
        <div>
            <h4>Doctor-Patient Messaging</h4>
        </div>
    </div>

    <div class="br-pagebody">
    <div class="chat-container d-flex">

        <!-- Sidebar (Patients) -->
        <div class="chat-sidebar border-end pe-3" style="width: 250px;">
            <h5 class="mb-3">Patients</h5>
            @foreach($patients as $patient)
                <div class="patient p-2 mb-2 rounded border {{ $loop->first ? 'active bg-primary text-white' : 'bg-light' }}"
                     data-patient-id="{{ $patient->id }}" style="cursor: pointer;">
                    <strong>{{ $patient->patient_name }}</strong><br>
                    <small>{{ $patient->appointment_date }}</small>
                </div>
            @endforeach
        </div>

        <!-- Chat Messages -->
        {{-- <div class="chat-messages flex-grow-1 px-3">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Conversation</h5>
                <button type="button" class="btn btn-outline-success" id="videoCallBtn">
                    <i class="icon ion-ios-videocam"></i> Video Call
                </button>
            </div>

            <div class="chat-box mb-3 p-3 border rounded" id="chat-box" style="height: 400px; overflow-y: auto; background-color: #f9f9f9;">

            </div>

            <form id="chatForm" class="d-flex">
                @csrf
                <input type="hidden" name="patient_id" id="patient_id" value="{{ $activePatient->id ?? '' }}">
                <input type="text" name="text" id="messageInput" class="form-control me-2" placeholder="Type a message..." required>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div> --}}
        <div class="chat-messages flex-grow-1 px-3">

    <!-- Video Call Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Conversation</h5>
        <button type="button" class="btn btn-outline-success" id="videoCallBtn">
            <i class="icon ion-ios-videocam"></i> Video Call
        </button>
    </div>

    <!-- Chat Box -->
    <div class="chat-box mb-3 p-3 border rounded" id="chat-box">
        {{-- AJAX messages will appear here --}}
    </div>

    <!-- Send Message Form -->
    <form id="chatForm" class="d-flex">
        @csrf
        <input type="hidden" name="patient_id" id="patient_id" value="{{ $activePatient->id ?? '' }}">
        <input type="text" name="text" id="messageInput" class="form-control me-2" placeholder="Type a message..." required>
        <button type="btnsub" class="btn btn-primary">Send</button>
    </form>
</div>

        <!-- Files Section -->
        <div class="chat-files border-start ps-3" style="width: 250px;">
            <h6>Files & Reports</h6>
            @forelse($files as $file)
                @if(Str::endsWith($file->file_path, ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/' . $file->file_path) }}" alt="file" class="img-fluid rounded mb-2">
                @else
                    <a href="{{ asset('storage/' . $file->file_path) }}" class="file-link d-block mb-2 text-truncate" target="_blank">
                        {{ basename($file->file_path) }}
                    </a>
                @endif
            @empty
                <p class="text-muted">No files found.</p>
            @endforelse
        </div>

    </div>
</div>


    @include('doctors.layout.footer')
</div>
@endsection

@section('js__')
<script>
    // Scroll to bottom on load
    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;

    // Handle video call click
    document.getElementById('videoCallBtn').addEventListener('click', function () {
        alert('Video calling feature coming soon!');
        // Example for future: window.location.href = "/video-call?patient_id=" + selectedPatientId;
    });
</script>
{{-- <script>
    const appointmentId = "{{ $activePatient->id }}";

    // Send message via AJAX
    $('#chatForm').on('submit', function (e) {
        e.preventDefault();

        const text = $('#messageInput').val();
        if (!text.trim()) return;

        $.ajax({
            url: "{{ route('doctor.chat.send') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                patient_id: appointmentId,
                text: text
            },
            success: function (res) {
                $('#messageInput').val('');
                fetchMessages(); // refresh chat
            }
        });
    });

    // Fetch messages
    function fetchMessages() {
        $.get('/doctor/chat/messages/' + appointmentId, function (data) {
            let html = '';
            data.forEach(msg => {
                const className = msg.sender === 'doctor' ? 'sent' : 'received';
                html += `<div class="chat-message ${className}">${msg.text}</div>`;
            });
            $('#chat-box').html(html);
        });
    }

    // Initial load + refresh every 3 seconds
    fetchMessages();
    setInterval(fetchMessages, 3000);
</script> --}}
<script>
    const appointmentId = "{{ $activePatient->id }}";

    // Send message via AJAX
    $('#chatForm').on('btnsub', function (e) {
        e.preventDefault();

        const text = $('#messageInput').val();
        if (!text.trim()) return;

        $.ajax({
            url: "{{ route('doctor.chat.send') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                patient_id: appointmentId,
                text: text
            },
            success: function (res) {
                $('#messageInput').val('');
                fetchMessages(); // refresh chat
            }
        });
    });

    // Fetch messages
    function fetchMessages() {
        $.get('/doctor/chat/messages/' + appointmentId, function (data) {
            let html = '';
            data.forEach(msg => {
                const className = msg.sender === 'doctor' ? 'sent' : 'received';
                html += `<div class="chat-message ${className}">${msg.text}</div>`;
            });
            $('#chat-box').html(html);
            // Auto-scroll to the latest message
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
        });
    }

    // Initial load + refresh every 3 seconds
    fetchMessages();
    setInterval(fetchMessages, 3000);
</script>

@endsection
