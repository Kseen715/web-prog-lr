<script setup>
const props = defineProps(['warehouse', 'shelf']);
</script>

<template>
    <div class="line">
        <span><b>{{ warehouse }}</b></span>
        <span class="delim"></span>
        <span>{{ shelf }}</span>
    </div>
</template>

<style scoped>
.line {
    border-radius: 16px;
    padding: 10px 20px;
    margin: 0 10px 10px 10px;
    background-color: var(--color-background-op);
    color: var(--color-text);
    display: flex;
    flex-direction: line;
    align-items: center;
}

.line span {
    margin: 0 10px 0 0;
    font-size: large;
}

.line b {
    font-size: x-large;
    font-weight: bold;
}

.delim {
    border-left: 1px solid var(--color-text);
    height: 25px;
    margin: 0 10px;
}
</style>