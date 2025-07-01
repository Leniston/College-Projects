package B00158877_RobertLeniston_Assignment1;

public class Coffee {
    private static final String INVALID_ID_MSG = "Coffee ID must be positive";
    private static final String INVALID_BRAND_MSG = "Brand name cannot be empty";
    private static final String INVALID_TYPE_MSG = "Coffee type cannot be empty";
    private static final String INVALID_PRICE_MSG = "Price must be positive";
    private static final String INVALID_QUANTITY_MSG = "Quantity cannot be negative";

    private int id; // Coffee ID
    private String brand; // brand
    private String type; // Type of coffee
    private double pricePerKg; // Price per kg
    private double quantityInStock; // Quantity

    // constructor to start coffee object
    public Coffee(int id, String brand, String type, double pricePerKg, double quantityInStock) {
        // Check value before its actually used
        if (id <= 0) {
            throw new IllegalArgumentException(INVALID_ID_MSG);
        }

        if (brand == null || brand.isEmpty()) {
            throw new IllegalArgumentException(INVALID_BRAND_MSG);
        }

        if (type == null || type.isEmpty()) {
            throw new IllegalArgumentException(INVALID_TYPE_MSG);
        }

        if (pricePerKg <= 0) {
            throw new IllegalArgumentException(INVALID_PRICE_MSG);
        }

        if (quantityInStock < 0) {
            throw new IllegalArgumentException(INVALID_QUANTITY_MSG);
        }

        this.id = id;
        this.brand = brand;
        this.type = type;
        this.pricePerKg = pricePerKg;
        this.quantityInStock = quantityInStock;
    }

    // Getters
    public int getId() {
        return id;
    }

    public String getBrand() {
        return brand;
    }

    public String getType() {
        return type;
    }

    public double getPricePerKg() {
        return pricePerKg;
    }

    public double getQuantityInStock() {
        return quantityInStock;
    }

    // Setters with checks
    public void setId(int id) {
        if (id <= 0) {
            throw new IllegalArgumentException(INVALID_ID_MSG);
        }
        this.id = id;
    }

    public void setBrand(String brand) {
        if (brand == null || brand.isEmpty()) {
            throw new IllegalArgumentException(INVALID_BRAND_MSG);
        }
        this.brand = brand;
    }

    public void setType(String type) {
        if (type == null || type.isEmpty()) {
            throw new IllegalArgumentException(INVALID_TYPE_MSG);
        }
        this.type = type;
    }

    public void setPricePerKg(double pricePerKg) {
        if (pricePerKg <= 0) {
            throw new IllegalArgumentException(INVALID_PRICE_MSG);
        }
        this.pricePerKg = pricePerKg;
    }

    public void setQuantityInStock(double quantityInStock) {
        if (quantityInStock < 0) {
            throw new IllegalArgumentException(INVALID_QUANTITY_MSG);
        }
        this.quantityInStock = quantityInStock;
    }
}