<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');

            // jQuery.get('/api/user', function (data) {
            //     //alert('hi');
            //     console.log(data);
            //     //alert(data);
            // });
            axios.get('/api/user').then(res => console.log(res.data));
        }
    }
</script>
