@extends('admin.layout.layout')
@php
    $title = 'Ticket Details';
@endphp
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Ticket Number PW-0000001</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Ticket Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="chat-container">
                    <!-- Chat Messages -->
                    <div class="chat-messages">
                        <div class="message sent">Hello! How can I help you?</div>
                        <div class="message">I have a question about your services. Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Fugiat, quaerat in assumenda non molestias consequatur distinctio mollitia
                            excepturi doloribus amet sapiente laboriosam aperiam, eligendi numquam quo! Deserunt atque sunt
                            quo.
                        </div>
                    </div>

                    <!-- Chat Input -->
                    <div class="chat-input input-group">
                        <input type="text" class="form-control" placeholder="Type a message...">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>



        </div> <!-- container-fluid -->
    </div>

    <style>
        .chat-container {
            width: 100%;
            height: 80vh;
            border: 1px solid #ddd;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .chat-messages {
            flex-grow: 1;
            overflow-y: auto;
            padding: 10px;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            background-color: #e9ecef;
            max-width: 400px;
        }

        .message.sent {
            background-color: #0d6efd;
            color: #fff;
            align-self: flex-end;
        }

        .chat-input {
            display: flex;
            border-radius: 10px;
        }

        .chat-input input {
            flex-grow: 1;
            border-radius: 10px;

        }

        .chat-input button {
            border-radius: 10px;
        }
    </style>
@endsection
