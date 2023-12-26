# Tiki Online Ticketing System

Welcome to Tiki Online Ticketing System! This Laravel project allows you to manage and sell bus tickets online for a round-trip journey from Dhaka to Cox's Bazaar, with stops in Dhaka, Comilla, Chittagong, and Cox's Bazaar.

## Features

1. **Schedule a Trip:**
   - Utilize a user-friendly form to schedule a bus trip on a specific day.

2. **Seat Reservation:**
   - Users can search for available dates and purchase tickets for their preferred seat.
   - The bus has a total of 36 seats.

3. **User Data Preservation:**
   - User data is securely preserved in the system, ensuring a seamless and personalized experience.

4. **Tables:**
   - **Location Table:** Stores information about different locations (e.g., Dhaka, Comilla, Chittagong, Cox's Bazaar).
   - **User Table:** Preserves user details for future interactions.
   - **Trip Table:** Manages information related to scheduled bus trips.
   - **Seat Allocation Table:** Tracks seat reservations for each trip.

## Project Structure (MVC)

The project follows the Model-View-Controller (MVC) architectural pattern to ensure modularity and maintainability.

- **Models:**
  - Location model: Represents the locations for bus stops.
  - User model: Manages user information.
  - Trip model: Handles data related to bus trips.
  - SeatAllocation model: Tracks seat reservations.

- **Views:**
  - Forms and templates for creating trips, searching for available seats, and purchasing tickets.

- **Controllers:**
  - Logic to handle user input, process data, and interact with the models.

## Getting Started

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/seo-asif/ticket-Booking-System
   cd tiki-online-ticketing
   ```

2. **Install Dependencies:**
   ```bash
   composer install
   ```

3. **Set Up Environment:**
   - Copy the `.env.example` file to `.env` and configure your database settings.

4. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

5. **Serve the Application:**
   ```bash
   php artisan serve
   ```

6. **Access the Application:**
   Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Contributing

Contributions are welcome! If you have suggestions, bug reports, or want to contribute to the development, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE.md).

Happy Ticketing! 🚌✨