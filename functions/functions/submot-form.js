exports.handler = async (event, context) => {
  try {
    const formData = JSON.parse(event.body);

    // Send email or handle data as needed.
    // You can use a third-party service like SendGrid, Mailgun, or others.

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
