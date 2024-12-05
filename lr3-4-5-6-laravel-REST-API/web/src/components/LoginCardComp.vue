<script setup>
</script>

<template>
    <div class="login-card">
        <h2>Вход</h2>
        <form>
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Войти</button>
        </form>
    </div>
</template>

<style scoped>
.login-card {
    max-width: 300px;
    margin: 50px auto;
    padding: 40px;
    background-color: var(--color-background-lighter);
    border-radius: 10px;
}

.login-card h2 {
    text-align: center;
}

.login-card form {
    display: flex;
    flex-direction: column;
}

.login-card label {
    margin-bottom: 5px;
}

.login-card input {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-card button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-card button:hover {
    background-color: #45a049;
}
</style>