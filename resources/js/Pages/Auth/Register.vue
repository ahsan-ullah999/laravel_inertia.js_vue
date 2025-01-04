 <script setup>
import { useForm } from "@inertiajs/vue3";




const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});
const submit = () => {
    form.post("/register", {
        onError: () => form.reset("password","password_confirmation"),
    });


};
</script>





<template>
    <Head title="Register" />
    <h1 class="title">Register a new account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label>Name</label>
                <input type="text" v-model="form.name" />
                <small>{{ form.errors.name }}</small>
            </div>
            <div class="mb-6">
                <label>Email</label>
                <input type="email" v-model="form.email" />
                <small>{{ form.errors.email }}</small>
            </div>
            <div class="mb-6">
                <label>Password</label>
                <input type="password" v-model="form.password" />
                <small>{{ form.errors.password }}</small>
            </div>
            <div class="mb-6">
                <label>Confirm Password</label>
                <input type="password"  v-model="form.password_confirmation" />
            </div>
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disable="form.processing">Register</button>
            </div>

        </form>

    </div>
</template>
