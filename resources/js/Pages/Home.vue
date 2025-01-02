<script setup>
import { Head } from '@inertiajs/vue3';


</script>


<template>
    <Head :title="` ${$page.component}`" />


<h1>{{$page.props.user}}</h1>


</template>
