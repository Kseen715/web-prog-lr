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
        <nav class="horizontal-nav">
            <RouterLink to="/">Главная</RouterLink>
            <RouterLink to="/" class="search-minimized">Поиск</RouterLink>
            <RouterLink to="/" class="warehouses-minimized">Склады</RouterLink>
            <RouterLink to="/login">Логин</RouterLink>
        </nav>
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
    /* padding: 10px; */
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
    /* justify-content: space-between; */
    justify-content: center;
    /* justify-self: center; */
    align-items: center;
    /* take full parent body */
    height: 100%;

}

header .horizontal-nav a {
    text-decoration: none;
    color: var(--color-text-light);
}

header .horizontal-nav a:hover {
    color: var(--color-accent-blue);
}

@media (max-width:961px) {

    /* up to 961 */
    .inventory-header {
        display: none;
    }

    .search-minimized,
    .warehouses-minimized  {
        display: none;
    }
}

@media (max-width:641px) {

    /* up to 641 */
    .inventory-header,
    .search-bar {
        display: none;
    }

    .search-minimized,
    .warehouses-minimized {
        display: block;
    }
}

@media (max-width:481px) {

    /* up to 481 */
    .inventory-header,
    .logo-container,
    .search-bar {
        display: none;
    }

    .header {
        justify-self: center;
    }

    .search-minimized {
        display: block;
    }

    .horizontal-nav {
        width: 100%;
    }

    .search-minimized {
        display: block;
    }
}

@media (min-width:961px) {

    /* more than 961 */
    .header {
        justify-self: space-between;
    }

    .search-minimized {
        display: none;
    }
}

/* 
320px
481px
641px
961px
1025px
1281px
*/
</style>