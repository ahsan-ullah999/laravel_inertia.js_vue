
<script setup>

</script>


<template>
    <Head>
        <title>My app</title>
        <meta head-key="desc" name="description" content="This is the default description">
    </Head>
    <div>
        <header class="bg-indigo-400 text-white">
            <nav class="flex item-center justify-between p-4 max-w-screen-lg mx-auto">
                <div class="space-x-6">

                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>

                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
