@extends('medWebsite.master')

@section('medwebtitle')
    Message
@endsection

@section('mw-css')
<style>
    .sidebar {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .list-group-item {
        border: none;
        padding: 10px 0;
    }

    .sidebar-link {
        display: block;
        font-size: 16px;
        color: #333;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .sidebar-link:hover {
        background-color: #175CFF33;
        color: #175CFF;
        border-left: 4px solid #175CFF;
    }

    .sidebar-link.active {
        background-color: #175CFF33;
        color: #175CFF;
        border-left: 4px solid #175CFF;
    }

    .profile-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .profile-title {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }

    .chat-box {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        height: 300px;
        overflow-y: auto;
        padding: 15px;
    }

    .chat-message.sent {
        background-color: #d1f7c4;
        text-align: right;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 8px;
        max-width: 75%;
        margin-left: auto;
    }

    .chat-message.received {
        background-color: #e2e3e5;
        text-align: left;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 8px;
        max-width: 75%;
        margin-right: auto;
    }
</style>
@endsection

@section('medWebContent')
<div class="container mt-5 p-3">
    <div class="row">
        <!-- Sidebar: Doctor List -->
        <div class="col-md-3">
            <div class="sidebar">
                <h3 class="sidebar-title">Your Doctors</h3>
                <ul class="list-group">
                    @foreach($doctors as $doctorId => $appointments)
                        @php $doctor = $appointments->first()->doctor; @endphp
                        <li class="list-group-item">
                            <a href="{{ route('patient.chat.with', $doctorId) }}"
                               class="sidebar-link {{ $selectedDoctorId == $doctorId ? 'active' : '' }}">
                                Dr. {{ $doctor->name ?? 'N/A' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Chat Section -->
        <div class="col-md-9">
            <div class="profile-container">
                <h3 class="profile-title">
                    Chat with Dr. {{ $activeAppointment->doctor->name ?? 'Select a Doctor' }}
                </h3>

                <!-- Chat Box -->
                <div class="chat-box mb-3" id="chat-box">
                    @foreach($messages as $msg)
                        <div class="chat-message {{ $msg->sender === 'patient' ? 'sent' : 'received' }}">
                            {{ $msg->text }}
                        </div>
                    @endforeach
                </div>

                <!-- Message Input -->
                @if($activeAppointment)
                    <form id="chatForm" method="POST" action="{{ route('patient.chat.send') }}" class="d-flex">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $activeAppointment->id }}">
                        <input type="text" name="text" id="messageInput" class="form-control me-2" placeholder="Type a message..." required>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                @else
                    <p class="text-muted">Please select a doctor to start chatting.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const appointmentId = "{{ $activeAppointment->id ?? '' }}";

    function fetchMessages() {
        if (!appointmentId) return;
        $.get('/patient/chat/messages/' + appointmentId, function (data) {
            let html = '';
            data.forEach(msg => {
                const className = msg.sender === 'patient' ? 'sent' : 'received';
                html += `<div class="chat-message ${className}">${msg.text}</div>`;
            });
            $('#chat-box').html(html);
        });
    }

    fetchMessages();                     // Initial load
    setInterval(fetchMessages, 3000);    // Real-time polling every 3 seconds

    $('#chatForm').on('submit', function (e) {
        e.preventDefault();

        const text = $('#messageInput').val();
        if (!text.trim()) return;

        $.ajax({
            url: "{{ route('patient.chat.send') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                patient_id: appointmentId,
                text: text
            },
            success: function () {
                $('#messageInput').val('');
                fetchMessages();
            }
        });
    });
</script>
@endsection
