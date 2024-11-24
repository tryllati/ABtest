@extends('app')

@section('content')
    <div class="container">
        <figure>
            <blockquote class="blockquote">
                <p class="mt-5"
                   @if(! is_null(session('ab_test_variants')) && array_key_exists('2', session('ab_test_variants')))
                       @if(session('ab_test_variants')[2]->id == 3)
                           style="font-family: 'Times New Roman', Times, serif; font-size: 18px; font-weight: 400"
                       @elseif(session('ab_test_variants')[2]->id == 4)
                           style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: 600"
                       @elseif(session('ab_test_variants')[2]->id == 5)
                           style="font-family: Verdana; font-size: 18px; font-weight: 400"
                       @endif
                   @endif
                >
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </blockquote>
            <figcaption class="blockquote-footer mt-3">
                Someone famous in <cite title="Lorem Ipsum"><a href="https://www.lipsum.com/">Lorem Ipsum</a></cite>
            </figcaption>
        </figure>
    </div>
@endsection
