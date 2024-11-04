# Use the official Node.js 20 image as the base image
FROM node:20-alpine

# Set the working directory inside the container
WORKDIR /var/www

# Copy the package.json and files to the working directory
COPY package.json ./

# Install the dependencies using 
# RUN npm install -g @vue/cli
RUN npm install

# Install curl for healthcheck
RUN apk add --no-cache curl

# Copy the rest of the application code to the working directory
COPY . .

# Expose the port the application will run on
EXPOSE 3000

RUN npm run build

# Define the command to run the application
CMD ["npm", "run", "preview", "--", "--port", "3000", "--host"]

# Add a healthcheck to ensure the container is running correctly
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s --retries=3 \
  CMD curl -f http://localhost:3000/ || exit 1