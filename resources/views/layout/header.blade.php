<div class="container-fluid m-0 p-0">
    <header class="bg-light p-3 py-4">
        <div
            @if(! is_null(session('ab_test_variants')) && array_key_exists('1', session('ab_test_variants')))
                @if(session('ab_test_variants')[1]->id == 1)
                    class="d-flex justify-content-start"
                @elseif(session('ab_test_variants')[1]->id == 2)
                    class="d-flex justify-content-center"
                @endif
            @else
                class="d-flex justify-content-end"
            @endif
        >
            <a href="/">
                <img src="https://brokerchooser.com/images/brokerchooser-logo.png" alt="BrokerChooser logo">
            </a>
        </div>
    </header>
</div>
