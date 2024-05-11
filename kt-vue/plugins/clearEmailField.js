// plugins/clearEmailField.js

export default ({ app }) => {
    app.router.beforeEach((to, from, next) => {
      // Check if the route is leaving the page containing the footer form
      if (from.name === 'Footer') {
        // Clear the email field in the form
        app.$root.$emit('clearEmailField');
      }
      next();
    });
  };
  