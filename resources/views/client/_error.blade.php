<p>
    @if (isset($response['error_description']))
        {{ $response['error_description'] }}
        @if (isset($response['error_uri']))
            (<a href="{{$response['error_uri']}}">more information</a>)
        @endif
    @elseif (is_array($response))
        <pre>{{ json_encode($response) }}<pre>
    @else
        <p>
            Unable to parse response:
        </p>
        <pre>{{ var_dump($response) }}<pre>
        <br/>
    @endif
</br>
