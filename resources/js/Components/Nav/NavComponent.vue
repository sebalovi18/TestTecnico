<template>
  <div class="border-bottom border-light">
    <b-navbar type="dark" variant="dark" toggleable="md" class="justify-content-end">
      <b-navbar-toggle target="main-nav" class="border-0">
        <template #default="{expanded}">
          <b-icon icon="x-circle-fill" v-if="expanded" variant="light"></b-icon>
          <b-icon icon="list" v-else variant="light"></b-icon>
        </template>
      </b-navbar-toggle>
      <b-collapse id="main-nav" is-nav class="justify-content-center justify-content-md-end">
        <b-navbar-nav>
          <b-nav-item to="/">Home</b-nav-item>
          <b-nav-item to="/register">Register</b-nav-item>
          <b-nav-item to="/news">News</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>
<script>
export default {};
</script>