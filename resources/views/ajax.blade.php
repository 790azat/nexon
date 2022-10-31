<script type="text/javascript">

    const parameters = [];
    parameters["button-id"] = '{{$buttonId}}'
    parameters["route"] = '{{$route}}'
    @if($inputs != null)
        @foreach($inputs as $input)
            parameters["{{$input}}"] = '{{$input}}'
        @endforeach
    @endif



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        }
    });

    $("#" + parameters["button-id"]).click(function(e){

        e.preventDefault();

        var name = $("#" + parameters["name"]).val();
        var icon = $("#" + parameters["icon"]).val();

        $.ajax({
            type:'POST',
            url:parameters["route"],
            data:{name:name, icon:icon},
            success:function(data){
                if($.isEmptyObject(data.error)){

                }else{
                    printErrorMsg(data.error);
                }
            }
        });

    });

</script>
