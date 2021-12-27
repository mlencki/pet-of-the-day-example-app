<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #cursor {
            animation: blink .75s step-end infinite;
        }

        @keyframes blink {
            from, to {
                visibility: visible;
            }
            50% {
                visibility: hidden;
            }
        }

        body {
            background-color: #ffffff;
            opacity: 1;
            background-image:  linear-gradient(135deg, #f4fbff 25%, transparent 25%), linear-gradient(225deg, #f4fbff 25%, transparent 25%), linear-gradient(45deg, #f4fbff 25%, transparent 25%), linear-gradient(315deg, #f4fbff 25%, #ffffff 25%);
            background-position:  40px 0, 40px 0, 0 0, 0 0;
            background-size: 80px 80px;
            background-repeat: repeat;
        }
    </style>
</head>
<body>
<div class="flex">
    <div class="m-auto text-center">
        <div class="p-10 text-left">
            <h1 class="text-6xl p-10 font-bold text-zinc-800 ml-20" style="width:800px">
                🐈 cat of the
                <span id="text" class="text-sky-500 underline"></span><span id="cursor" class="mx-1 text-sky-500">I</span>
            </h1>
        </div>
        @foreach ($ranking as $rankingItem)
            <div class="p-5 w-full">
                <h3 class="text-4xl font-bold text-zinc-600">cat of the {{ $rankingItem->type }}</h3>
                <div class="mt-5 drop-shadow-lg">
                    <img class="inline rounded-lg" style="width:500px"
                         src="{{ $rankingItem->url }}"
                         alt="...">
                </div>
                <div class="text-md mt-5 italic text-zinc-600">generated {{ $rankingItem->created_at->diffForHumans() }}</div>
            </div>
            <hr>
        @endforeach
    </div>
</div>
<script>
    var _CONTENT = [
        "day",
        "week",
        "month",
        "year",
    ];

    // Current sentence being processed
    var _PART = 0;

    // Character number of the current sentence being processed
    var _PART_INDEX = 0;

    // Holds the handle returned from setInterval
    var _INTERVAL_VAL;

    // Element that holds the text
    var _ELEMENT = document.querySelector("#text");

    // Cursor element
    var _CURSOR = document.querySelector("#cursor");

    // Implements typing effect
    function Type() {
        // Get substring with 1 characater added
        var text =  _CONTENT[_PART].substring(0, _PART_INDEX + 1);
        _ELEMENT.innerHTML = text;
        _PART_INDEX++;

        // If full sentence has been displayed then start to delete the sentence after some time
        if(text === _CONTENT[_PART]) {
            // Hide the cursor


            clearInterval(_INTERVAL_VAL);
            setTimeout(function() {
                _INTERVAL_VAL = setInterval(Delete, 550);
            }, 1000);
        }
    }

    // Implements deleting effect
    function Delete() {
        // Get substring with 1 characater deleted
        var text =  _CONTENT[_PART].substring(0, _PART_INDEX - 1);
        _ELEMENT.innerHTML = text;
        _PART_INDEX--;

        // If sentence has been deleted then start to display the next sentence
        if(text === '') {
            clearInterval(_INTERVAL_VAL);

            // If current sentence was last then display the first one, else move to the next
            if(_PART == (_CONTENT.length - 1))
                _PART = 0;
            else
                _PART++;

            _PART_INDEX = 0;

            // Start to display the next sentence after some time
            setTimeout(function() {
                _INTERVAL_VAL = setInterval(Type, 400);
            }, 200);
        }
    }

    // Start the typing effect on load
    _INTERVAL_VAL = setInterval(Type, 400);
</script>
</body>
</html>