<template>
    <div>
        <button class="btn btn-outline-secondary font-weight-bold" @click="follows" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId','stat'],
        mounted() {
            console.log('Component mounted.')
     },
        data: function(){
           return {
               state: this.stat
           }
        },
        methods: {
            follows()
            {
                axios.post('/follow/' + this.userId )
                    .then(response=>{
                        console.log(response.data);
                        this.state = !this.state;

                    })
                    .catch(errors=>{
                        if(errors.response.status == 401)
                        {
                            window.location('login');
                        }
                    });
            }
        },
        computed: {
            buttonText()
            {
                return (this.state) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
