@extends('layouts.app', ['page' => 'chat'])

@section('title', 'Chat' )
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                {{-- <div class="col-12 col-lg-5 col-xl-3 border-end">
          
   
                </div> --}}
                <div class="col-12 col-lg-7 col-xl-9 d-flex flex-column">
                    <div class="card-body scrollable" style="height: 35rem">
                        <div class="chat">
                            <div class="chat-bubbles">
                                @isset($chats)
                                    @foreach ($chats as $chat)
                                        <div class="direct-chat-msg {{ $chat->ismine?'right':'' }}">
                                            @if ( $chat->ismine)
                                                <div class="chat-item">
                                                    <div class="row align-items-end justify-content-end">
                                                        <div class="col col-lg-6">
                                                            <div class="chat-bubble chat-bubble-me">
                                                                <div class="chat-bubble-title">
                                                                    <div class="row">
                                                                        <div class="col chat-bubble-author">{{ auth()->user()->name }}</div>
                                                                        <div class="col-auto chat-bubble-date">{{ $chat->created_at->diffForHumans() }}</div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-bubble-body">
                                                                    <p>{{ $chat->message }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto"><span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            <div class="chat-item">
                                                    <div class="row align-items-end">
                                                        <div class="col-auto"><span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                                                        </div>
                                                        <div class="col col-lg-6">
                                                            <div class="chat-bubble">
                                                                <div class="chat-bubble-title">
                                                                    <div class="row">
                                                                        <div class="col chat-bubble-author">{{ $chat->sender->name }} </div>
                                                                        <div class="col-auto chat-bubble-date">{{ $chat->created_at->diffForHumans() }}</div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-bubble-body">
                                                                    <p>{{ $chat->message }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- @isset($user) --}}
                            <form action="{{ route('user.chat.send') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="message" class="form-control" autocomplete="off" placeholder="أكتب رسالة">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">إرسال</button>
                                    </span>
                                </div>
                            </form>
                        {{-- @endisset --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
    {{-- <div class="input-group input-group-flat">
        
        <input type="text" class="form-control" autocomplete="off" placeholder="Type message" />
        <span class="input-group-text">
            <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Clear search" title="Clear search"> <!-- Download SVG icon from http://tabler-icons.io/i/mood-smile -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 10l.01 0" /><path d="M15 10l.01 0" /><path d="M9.5 15a3.5 3.5 0 0 0 5 0" /></svg>
</a>
<a href="#" class="link-secondary ms-2" data-bs-toggle="tooltip" aria-label="Add notification" title="Add notification"> <!-- Download SVG icon from http://tabler-icons.io/i/paperclip -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" /></svg>
</a>
</span>
</div> --}}