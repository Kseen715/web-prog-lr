<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <div class="left-nav">
        <nav>
            <select>
                <option value="warehouse1">Склад 1</option>
                <option value="warehouse2">Склад 2</option>
                <option value="warehouse3">Склад 3</option>
            </select>
            <ul>
                <li><RouterLink to="/shelf"><button>Полка #0F6A</button></RouterLink></li>
                <li><RouterLink to="/shelf"><button>Полка #0F6A</button></RouterLink></li>
                <li><RouterLink to="/shelf"><button>Полка #0F6A</button></RouterLink></li>
                <li><RouterLink to="/shelf"><button>Полка #0F6A</button></RouterLink></li>
            </ul>
        </nav>
    </div>
</template>

<style scoped>
.left-nav {
    border-radius: 16px;
    max-width: 200px;
    width: 20%;
    position: sticky;
    top: 0;
    height: 100% - 20px;
    background-color: var(--color-background-op);
    margin: 0 0 0 10px;
    padding: 10px;
    /* min-height: 400px; */
    /* min-height: 80vh; */
}

.left-nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.left-nav li {
    margin: 5px;
}

.left-nav button {
    padding: 5px;
    text-decoration: none;
    display: block;
    width: 100%;
    background-color: var(--color-background-op);
    border: 3px solid var(--color-background-darker);
    border-radius: 16px;
    color: var(--color-text);
}

.left-nav button:hover {
    color: var(--color-accent-blue);
    border-color: var(--color-accent-blue);
    background-color: var(--color-background-lighter);
    cursor: pointer;
}

.left-nav select {
    padding: 5px;
    text-decoration: none;
    display: block;
    width: 100%;
    background-color: var(--color-background-op);
    border: 3px solid var(--color-background-darker);
    border-radius: 8px;
    color: var(--color-text);
}

.left-nav select:focus {
    outline:none!important;
}

.left-nav select:hover,
.left-nav select:focus {
    color: var(--color-accent-blue);
    border-color: var(--color-accent-blue);
    background-color: var(--color-background-lighter);
    cursor: pointer;
}

@media (max-width:961px) {

    /* up to 961 */

}

@media (max-width:641px) {

    /* up to 641 */
    .left-nav {
        display: none;
    }
}

@media (max-width:481px) {

    /* up to 481 */

}

@media (min-width:961px) {

    /* more than 961 */

}
</style>