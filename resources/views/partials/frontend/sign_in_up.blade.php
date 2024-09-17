<div class="flex flex-col md:flex-row gap-4">
    <div class="w-2/2 md:w-1/2 text-left border-red border-b-2 pb-5  sm:text-right sm:pb-0 sm:pr-5 sm:border-b-0 sm:border-r-2">
        <h3 class="text-1x5 font-bold leading-none mb-1">New Member</h3>
        <p class="mb-0"><a class="font-bold text-red signup" href="/signup">Create</a> an account to access</p>
    </div>
    <div class="w-2/2 md:w-1/2">
        <h3 class="text-1x5 font-bold leading-none mb-1">Already a Member?</h3>
        <p class="mb-0"><a class="font-bold text-red signin" href="/signin">Login here</a> to access</p>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        $('.signup, .signin').on('click',function(e){
            e.preventDefault();
            const el = $(this);
            const formElement = el.closest('#bookform')[0];
            const formData = new FormData(formElement);
            formData.append('redirect', '/fieldsrental')
            $.ajax({
                url: "{{ route('session.fieldsrental') }}", // Save session.
                type:'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(response){
                    if(response.success){
                        window.location.href = el.attr('href');
                    }
                    // console.log(response);
                }
            });
                   
        })

    });
</script>