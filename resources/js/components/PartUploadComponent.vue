<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div v-if="success != ''" class="alert alert-success">
                    {{success}}
                </div>
                <div v-if="errors != ''" class="alert alert-danger">
                    <ul>
                        <li v-for="(error, index) in errors" :key="index">
                            <span v-for="message in error" :key="message">{{message}}</span>
                        </li>
                    </ul>
                </div>

                <form @submit="formSubmit" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="exampleInputEmail1">File/Image</label>
                        <input type="file" class="form-control" v-on:change="onFileChange">
                        <small id="emailHelp" class="form-text text-muted">Max 2mb :)</small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1">Part name</label>
                        <input type="text" class="form-control" v-on:change="onNameChange">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1">Position</label>
                        <select v-model="selected" class="dropdown-toggle form-control"  v-on:change="onPositionChange">
                            <option v-for="option in positionOptions" v-bind:value="option.value" v-bind:key="option.value">
                            {{ option.text }}
                            </option>
                        </select>
                    </div>



                    <button class="btn btn-primary btn-block">Upload</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                file: '',
                positionId: '',
                success: '',
                errors: '',
                // Change this to ajax call
                positionOptions: [
                    { text: 'Shape', value: 1 },
                    { text: 'Eyes', value: 2 },
                    { text: 'Nose', value: 3 },
                    { text: 'Mouth', value: 4 }
                ]
            };
        },
        methods: {
            onFileChange(e) {
                this.file = e.target.files[0];
            },
            onNameChange(e) {
                this.name = e.target.value;
            },
            onPositionChange(e) {
                console.log('Changing');
                console.log('Changing', e.target.value);
                this.positionId = e.target.value;
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let data = new FormData();
                data.append('file', this.file);
                data.append('name', this.name);
                data.append('position_id', this.positionId);

                axios.post('/upload', data, config)
                    .then(function (res) {
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.errors = err.response.data.errors;
                    });
            }
        }
    }

</script>