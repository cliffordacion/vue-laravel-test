<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="my-5 py-5" v-if="loading">
                    <p class="text-center my-5 py-5">
                        Loading...
                    </p>
                </div>

                <div v-if="!loading" class="faces-container">
                    <div v-for="(face, index) in faces" class="face-image" :key="index">
                        <img v-for="(part, index) in face" 
                            :key="index"
                            :src="part.path"
                            class="part-image"
                        />
                        <div class="desc">{{index + 1}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                faces: '',
                loading: true
            };
        },
        methods: {
            async fetchCombinations() {
                try {
                    this.error = null;
                    this.loading = true;
                    const url = `/combination`;

                    const response = await axios.get(url);
                    const results = response.data;
                    this.faces = results;
                    console.log(results);
                } catch (err) {
                    if (err.response) {
                        // client received an error response (5xx, 4xx)
                        this.error = {
                            title: "Server Response",
                            message: err.message
                        };
                    } else if (err.request) {
                        // client never received a response, or request never left
                        this.error = {
                            title: "Unable to Reach Server",
                            message: err.message
                        };
                    } else {
                        // There's probably an error in your code
                        this.error = {
                            title: "Application Error",
                            message: err.message
                        };
                    }
                }
                this.loading = false;
            }
        },
        mounted() {
            this.fetchCombinations();
        }
    }

</script>