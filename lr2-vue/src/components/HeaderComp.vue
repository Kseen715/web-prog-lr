<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <header>
        <RouterLink class="logo-container" to="/">
            <img class="logo" src="https://github.com/Kseen715/imgs/raw/main/sakura_kharune.png" alt="logo">
        </RouterLink>
        <h1 class="inventory-header">Инвентарь</h1>
        <div class="search-bar">
            <input type="text" placeholder="Поиск...">
            <button type="submit">Поиск</button>
        </div>
        <!-- <div class="horizontal-nav-container"> -->
        <nav class="horizontal-nav">
            <RouterLink to="/">Главная</RouterLink>
            <RouterLink to="/shelf">Полка</RouterLink>
            <RouterLink to="/login">Логин</RouterLink>
        </nav>
        <!-- </div> -->
    </header>
</template>

<style scoped>
header {
    background-color: var(--color-background-accented);
    max-height: 100px;
    display: flex;
    flex-direction: row;
    align-items: center;
    flex-wrap: wrap;

    padding: 0 20px;
    height: 15vh;
    color: var(--color-text-light);
    margin: 10px;
    border-radius: 16px;
    justify-content: space-between;
}

header nav {
    display: flex;
    flex-direction: row;
    align-items: center;
}

header h1 {
    margin: 0;
    padding-right: 20px;
}

header .logo-container {
    height: 80%;
    padding: 10px;
}

header .logo {
    height: 100%;
}

header .horizontal-nav {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 20px;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

header .horizontal-nav a {
    text-decoration: none;
    color: var(--color-text-light);
}

header .horizontal-nav a:hover {
    color: var(--color-accent-blue);
}

@media (max-width: 420px) {

    .inventory-header,
    .logo-container {
        display: none;
    }

    .header {
        justify-content: center;
    }
}

@media (max-width: 1600px) {
    .header {
        justify-content: space-between;
    }
}
</style>