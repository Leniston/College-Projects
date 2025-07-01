import java.io.*;
import java.util.ArrayList;
import java.util.Date;
import java.text.SimpleDateFormat;
import java.util.Scanner;

public class PointOfSaleSystem {
    // ANSI escape codes for colors
    public static final String RED = "\u001B[31m";
    public static final String RESET = "\u001B[0m";

    // File paths
    private static final String STOCK_FILE = "StockList.txt";
    private static final String TRANSACTION_FILE = "Transactions.txt";

    // Date format for transaction timestamps
    private static final SimpleDateFormat DATE_FORMAT = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");

    // Lists to store stock items and items in the cart
    private static ArrayList<String> stockItems = new ArrayList<>();
    private static ArrayList<String> cart = new ArrayList<>();

    // Total amount of the current transaction
    private static double totalAmount = 0;

    public static void main(String[] args) {
        // Load stock items from file
        loadStockItems();
        Scanner scanner = new Scanner(System.in);

        while (true) {
            // Display the main menu
            displayMenu();
            int choice = scanner.nextInt();
            scanner.nextLine(); // Consume newline

            // Process user choice
            switch (choice) {
                case 1:
                    viewItems();
                    break;
                case 2:
                    addItemToCart(scanner);
                    break;
                case 3:
                    viewCart();
                    break;
                case 4:
                    checkout();
                    break;
                case 5:
                    System.out.println("Thank you for shopping with us!");
                    System.exit(0);
                default:
                    System.out.println("Invalid choice. Please enter a number between 1 and 5.");
            }
        }
    }

    // Method to display the main menu
    private static void displayMenu() {
        System.out.println("*****************************");
        System.out.println("Welcome to the Hardware Store");
        System.out.println("*****************************");
        System.out.println("1. View Items");
        System.out.println("2. Add Item to Cart");
        System.out.println("3. View Cart");
        System.out.println("4. Checkout");
        System.out.println("5. Exit");
        System.out.println();
        System.out.print("Enter your choice: ");
    }

    // Method to load stock items from file
    private static void loadStockItems() {
        try (BufferedReader reader = new BufferedReader(new FileReader(STOCK_FILE))) {
            String line;
            while ((line = reader.readLine()) != null) {
                stockItems.add(line);
            }
        } catch (IOException e) {
            System.out.println("An error occurred while reading the file.");
            e.printStackTrace();
        }
    }

    // Method to view available items
    private static void viewItems() {
        System.out.println();
        System.out.println(RED +"Available Items:");
        System.out.println("*************");

        for (String item : stockItems) {
            System.out.println(item);
        }
        System.out.println("*************" + RESET);
        System.out.println();
    }

    // Method to add an item to the cart
    private static void addItemToCart(Scanner scanner) {
        int itemNumber;
        do {
            System.out.print("Enter the item number to add to cart (or 0 to exit): ");
            itemNumber = scanner.nextInt();
            if (itemNumber == 0) {
                return; // Exit the method if the user enters 0
            } else if (itemNumber >= 1 && itemNumber <= stockItems.size()) {
                String itemToAdd = stockItems.get(itemNumber - 1);
                cart.add(itemToAdd);
                System.out.println(RED+ "******************");
                System.out.println("Item added to cart: " + itemToAdd);
                System.out.println("******************" + RESET);
                System.out.println();
            } else {
                System.out.println("Invalid item number.");
            }
        } while (true);
    }

    // Method to view the cart
    private static void viewCart() {
        System.out.println(RED +"**********");
        System.out.println("Your Cart:");
        System.out.println("**********" );
        for (String item : cart) {
            System.out.println(item);
        }
        System.out.println(RESET);
    }

    // Method to checkout and write transaction details to file
    private static void checkout() {
        try (PrintWriter writer = new PrintWriter(new FileWriter(TRANSACTION_FILE, true))) {
            // Write transaction date
            writer.println("Transaction Date: " + DATE_FORMAT.format(new Date()));
            writer.println("Items Purchased:");
            // Write each item in the cart and update total amount
            for (String item : cart) {
                writer.println(item);
                String[] parts = item.split(",");
                totalAmount += Double.parseDouble(parts[1].trim());
            }
            // Write total amount and separator
            writer.println("Total Amount: $" + totalAmount);
            writer.println("---------------------------------------");
            writer.println();
        } catch (IOException e) {
            System.out.println("An error occurred while writing to the transaction file.");
            e.printStackTrace();
        }
        // Print completion message, clear cart, and reset total amount
        System.out.println(RED +"*********************************");
        System.out.println("Transaction completed. Thank you!");
        System.out.println("Please find your receipt in the Transaction file");
        System.out.println("*********************************" + RESET);
        System.out.println("");
        cart.clear();
        totalAmount = 0;
    }
}
