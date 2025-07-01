package B00158877_RobertLeniston_Assignment1;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Properties;
import javax.swing.JOptionPane;

public class DatabaseManager {
    private Connection conn;

    // Constructor to establish database connection
    public DatabaseManager() {
        String url = "";
        String user = "";
        String password = "";

        try (BufferedReader reader = new BufferedReader(new FileReader("db.properties"))) {
            Properties props = new Properties();
            props.load(reader);
            url = props.getProperty("url");
            user = props.getProperty("user");
            password = props.getProperty("password");

            conn = DriverManager.getConnection(url, user, password);
            System.out.println("Connected Successfully!");
        } catch (IOException | SQLException e) {
            System.err.println("Error connecting to database: " + e.getMessage());
        }
    }

    // Method to retrieve all coffee records from the database
    public List<Coffee> getAllCoffees() {
        List<Coffee> coffeeList = new ArrayList<>();
        String query = "SELECT * FROM coffee";

        try (PreparedStatement stmt = conn.prepareStatement(query);
             ResultSet rs = stmt.executeQuery()) {

            while (rs.next()) {
                Coffee coffeeRecord = new Coffee(
                    rs.getInt("ID"),
                    rs.getString("brand"),
                    rs.getString("type"),
                    rs.getDouble("pricePerKg"),
                    rs.getDouble("quantityInStock")
                );
                coffeeList.add(coffeeRecord);
            }

        } catch (SQLException e) {
            System.err.println("Error retrieving coffee records: " + e.getMessage());
        }

        return coffeeList;
    }

    // Method to insert a new coffee record into the database
    public void addCoffee(Coffee newCoffee) {
        if (doesCoffeeExist(newCoffee.getId())) {
            JOptionPane.showMessageDialog(null, "Coffee ID already exists.");
            return;
        }

        String query = "INSERT INTO coffee (ID, brand, type, pricePerKg, quantityInStock) VALUES (?, ?, ?, ?, ?)";

        try (PreparedStatement stmt = conn.prepareStatement(query)) {
            stmt.setInt(1, newCoffee.getId());
            stmt.setString(2, newCoffee.getBrand());
            stmt.setString(3, newCoffee.getType());
            stmt.setDouble(4, newCoffee.getPricePerKg());
            stmt.setDouble(5, newCoffee.getQuantityInStock());

            int rowsInserted = stmt.executeUpdate();
            if (rowsInserted > 0) {
                JOptionPane.showMessageDialog(null, "Coffee added successfully!");
            }
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "Error adding coffee: " + e.getMessage());
        }
    }

    // Method to remove a coffee record by ID
    public void removeCoffeeById(int coffeeId) {
        if (!doesCoffeeExist(coffeeId)) {
            JOptionPane.showMessageDialog(null, "ID does not exist.");
            return;
        }

        int confirm = JOptionPane.showConfirmDialog(null,
            "Are you sure you want to delete this record?",
            "Confirm Deletion",
            JOptionPane.YES_NO_OPTION);

        if (confirm == JOptionPane.YES_OPTION) {
            String query = "DELETE FROM coffee WHERE ID = ?";

            try (PreparedStatement stmt = conn.prepareStatement(query)) {
                stmt.setInt(1, coffeeId);

                int rowsDeleted = stmt.executeUpdate();
                if (rowsDeleted > 0) {
                    JOptionPane.showMessageDialog(null, "Coffee record deleted successfully.");
                }
            } catch (SQLException e) {
                JOptionPane.showMessageDialog(null, "Error deleting coffee record: " + e.getMessage());
            }
        } else {
            JOptionPane.showMessageDialog(null, "Deletion canceled.");
        }
    }

    // Method to update stock quantity by ID
    public void updateStockQuantityById(int coffeeId, double newQuantity) {
        if (!doesCoffeeExist(coffeeId)) {
            JOptionPane.showMessageDialog(null, "ID does not exist.");
            return;
        }

        if (newQuantity <= 0) {
            JOptionPane.showMessageDialog(null, "Please enter a valid stock quantity greater than 0.");
            return;
        }

        String query = "UPDATE coffee SET quantityInStock = ? WHERE ID = ?";

        try (PreparedStatement stmt = conn.prepareStatement(query)) {
            stmt.setDouble(1, newQuantity);
            stmt.setInt(2, coffeeId);

            int rowsUpdated = stmt.executeUpdate();
            if (rowsUpdated > 0) {
                JOptionPane.showMessageDialog(null, "Stock quantity updated successfully!");
            }
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "Error updating stock quantity: " + e.getMessage());
        }
    }

    // Method to search coffee by ID
    public void searchCoffeeById(int coffeeId) {
        if (!doesCoffeeExist(coffeeId)) {
            JOptionPane.showMessageDialog(null, "ID does not exist.");
            return;
        }

        String query = "SELECT * FROM coffee WHERE ID = ?";

        try (PreparedStatement stmt = conn.prepareStatement(query)) {
            stmt.setInt(1, coffeeId);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                String coffeeDetails = String.format(
                    "ID: %d\nBrand: %s\nType: %s\nPrice per Kg: %.2f\nQuantity in Stock: %.2f",
                    rs.getInt("ID"),
                    rs.getString("brand"),
                    rs.getString("type"),
                    rs.getDouble("pricePerKg"),
                    rs.getDouble("quantityInStock")
                );
                JOptionPane.showMessageDialog(null, coffeeDetails, "Coffee Details", JOptionPane.INFORMATION_MESSAGE);
            }
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "Error retrieving coffee record: " + e.getMessage());
        }
    }

    // Helper method to check if a coffee record exists by ID
    private boolean doesCoffeeExist(int coffeeId) {
        String query = "SELECT COUNT(*) FROM coffee WHERE ID = ?";

        try (PreparedStatement stmt = conn.prepareStatement(query)) {
            stmt.setInt(1, coffeeId);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                return rs.getInt(1) > 0;
            }
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "Error checking coffee record: " + e.getMessage());
        }
        return false;
    }
}