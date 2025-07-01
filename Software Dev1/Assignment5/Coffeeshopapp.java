package B00158877_RobertLeniston_Assignment1;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.List;

public class Coffeeshopapp extends JFrame {

    private JTextField coffeeIdField, coffeeBrandField, coffeeTypeField, pricePerKgField, quantityField;
    private JButton addButton, removeButton, updateButton, searchButton, viewAllButton;
    private JTextArea resultArea;
    private DatabaseManager dbManager;

    public Coffeeshopapp() {
        dbManager = new DatabaseManager();

        // sets up GUI
        setTitle("Coffee Shop Management");
        setSize(1000, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setResizable(false);

        // main panel
        JPanel mainPanel = new JPanel(new BorderLayout(10, 10));

        // left panel for buttons and input fields
        JPanel leftPanel = new JPanel();
        leftPanel.setLayout(new BoxLayout(leftPanel, BoxLayout.Y_AXIS));

        // top row for view  and search buttons
        JPanel topRow = new JPanel();
        topRow.setLayout(new FlowLayout(FlowLayout.LEFT));

        viewAllButton = new JButton("View all Coffee");
        searchButton = new JButton("Search by ID");

        topRow.add(viewAllButton);
        topRow.add(searchButton);

        // Middle row for add, remove & update  buttons
        JPanel middleRow = new JPanel();
        middleRow.setLayout(new FlowLayout(FlowLayout.LEFT));

        addButton = new JButton("Add Coffee");
        removeButton = new JButton("Remove Coffee");
        updateButton = new JButton("Update Stock");

        middleRow.add(addButton);
        middleRow.add(removeButton);
        middleRow.add(updateButton);

        // bottom row for input fields
        JPanel inputRow = new JPanel();
        inputRow.setLayout(new GridLayout(5, 2, 5, 5));

        coffeeIdField = new JTextField(10);
        coffeeBrandField = new JTextField(10);
        coffeeTypeField = new JTextField(10);
        pricePerKgField = new JTextField(10);
        quantityField = new JTextField(10);

        inputRow.add(new JLabel("Coffee ID:"));
        inputRow.add(coffeeIdField);
        inputRow.add(new JLabel("Brand:"));
        inputRow.add(coffeeBrandField);
        inputRow.add(new JLabel("Type:"));
        inputRow.add(coffeeTypeField);
        inputRow.add(new JLabel("Price per Kg:"));
        inputRow.add(pricePerKgField);
        inputRow.add(new JLabel("Quantity:"));
        inputRow.add(quantityField);

        // add elements to left panel
        leftPanel.add(topRow);
        leftPanel.add(middleRow);
        leftPanel.add(inputRow);

        // right panel for result area w/ border
        resultArea = new JTextArea(20, 30);
        resultArea.setEditable(false);
        resultArea.setBorder(BorderFactory.createEmptyBorder(5, 5, 5, 5));
        JScrollPane scrollPane = new JScrollPane(resultArea);

        // add left and right panels to main panel
        mainPanel.add(leftPanel, BorderLayout.WEST);
        mainPanel.add(scrollPane, BorderLayout.CENTER);

        // add main panel to frame
        add(mainPanel);

        // Action listeners for buttons
        addButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    // Parse and validate values
                    int id = Integer.parseInt(coffeeIdField.getText());
                    String brand = coffeeBrandField.getText();
                    String type = coffeeTypeField.getText();
                    double price = Double.parseDouble(pricePerKgField.getText());
                    double quantity = Double.parseDouble(quantityField.getText());

                    // Create new Coffee object
                    Coffee newCoffee = new Coffee(id, brand, type, price, quantity);
                    dbManager.addCoffee(newCoffee);
                    resultArea.setText("Coffee added successfully!");

                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(null, "Please enter valid numerical values for ID, price, and quantity");
                } catch (IllegalArgumentException ex) {
                    JOptionPane.showMessageDialog(null, ex.getMessage());
                }
            }
        });
        removeButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    int coffeeId = Integer.parseInt(coffeeIdField.getText());
                    dbManager.removeCoffeeById(coffeeId);
                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(null, "Please enter a valid numeric ID");
                }
            }
        });

        updateButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                int coffeeId;

                // Check if ID field is empty
                if (coffeeIdField.getText().trim().isEmpty()) {
                    JOptionPane.showMessageDialog(null, "Please enter an ID.");
                    return;
                }

                                try {
                    coffeeId = Integer.parseInt(coffeeIdField.getText());
                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(null, "Coffee ID must be a numeric value.");
                    return;
                }

                            if (!quantityField.getText().trim().isEmpty()) {
                    try {
                        double newQuantity = Double.parseDouble(quantityField.getText());
                        dbManager.updateStockQuantityById(coffeeId, newQuantity);
                    } catch (NumberFormatException ex) {
                        JOptionPane.showMessageDialog(null, "Numerical values only for quantity.");
                        return;
                    }
                }
            }
        });

        searchButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                String input = coffeeIdField.getText();
                if (input.trim().isEmpty()) {
                    JOptionPane.showMessageDialog(null, "Please enter an ID.");
                    return;
                }

                try {
                    int coffeeId = Integer.parseInt(input);
                    dbManager.searchCoffeeById(coffeeId);
                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(null, "Please enter a valid numeric ID.");
                }
            }
        });

        viewAllButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                List<Coffee> allCoffees = dbManager.getAllCoffees();
                resultArea.setText("");
                for (Coffee c : allCoffees) {
                    resultArea.append("ID: " + c.getId() + ", Brand: " + c.getBrand() +
                                      ", Type: " + c.getType() + ", Price per Kg: " + c.getPricePerKg() +
                                      ", Quantity in Stock: " + c.getQuantityInStock() + "\n");
                }
            }
        });

        setVisible(true);
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new Coffeeshopapp());
    }
}