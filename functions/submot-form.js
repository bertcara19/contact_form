exports.handler = async (event, context) => {
  try {
      const formData = JSON.parse(event.body);

      // Handle form data or send an email
      // For simplicity, we're just returning a success message

      return {
          statusCode: 200,
          body: JSON.stringify({ message: 'Form submitted successfully' }),
      };
  } catch (error) {
      return {
          statusCode: 500,
          body: JSON.stringify({ message: 'An error occurred', error: error.message }),
      };
  }
};
