import java.util.Scanner;
import java.util.Arrays;

public class GradingApplication { // Class for the Grading Application

    int numOfResults; // Variable to store number of results
    Scanner myInput; // Scanner object
    String[] studentNames; // Array to store student names
    int[] studentGrades; // Array to store student grades

    public GradingApplication() {
        myInput = new Scanner(System.in); // Initialize Scanner

        do { // Loop to ensure valid input for number of results
            System.out.println("How many results will you be entering? (between 3 and 26): "); // Prompt user for input
            numOfResults = myInput.nextInt(); // stores number of results in the variable
            myInput.nextLine(); // consume newline
        } while (numOfResults < 3 || numOfResults > 26); // checks for min of 3 and max of 26 entries

        studentNames = new String[numOfResults];
        studentGrades = new int[numOfResults];
    }

    // prompts for student name followed by their grade
    public void processResults() { // process result method
        for (int i = 0; i < numOfResults; i++) {
            System.out.println("Enter student name (letters only): ");
            studentNames[i] = myInput.nextLine();
            while (!studentNames[i].matches("[a-zA-Z]+")) { // ensures student name is letter only
                System.out.println("Invalid input. Enter only letters: ");
                studentNames[i] = myInput.nextLine();
            }
            System.out.println("Enter student grade (between 1 and 100): ");
            studentGrades[i] = myInput.nextInt();
            while (studentGrades[i] < 1 || studentGrades[i] > 100) { // ensures student grade is between 1 and 100
                System.out.println("Invalid input. Enter a grade between 1 and 100: ");
                studentGrades[i] = myInput.nextInt();

            }
            myInput.nextLine(); // Consume newline character
        }
    }

    // grade calculations between line 41 and 67
    public double calculateAverageGrade() { // Method to calculate average grade
        double total = 0; // Variable to store total sum of grades
        for (int grade : studentGrades) { // Loop to calculate total sum of grades
            total += grade; // Add each grade to total sum
        }
        return total / numOfResults; // Calculate and return average grade
    }

    public int getLowestGrade() { // Method to find lowest grade
        int minGrade = studentGrades[0]; // Variable to store lowest grade
        for (int i = 1; i < numOfResults; i++) { // Loop to find lowest grade
            if (studentGrades[i] < minGrade) { // Condition to compare grades
                minGrade = studentGrades[i]; // Update lowest grade if condition is true
            }
        }
        return minGrade; // Return lowest grade
    }

    public int getHighestGrade() { // Method to find highest grade
        int maxGrade = studentGrades[0]; // Variable to store highest grade
        for (int i = 1; i < numOfResults; i++) { // Loop to find highest grade
            if (studentGrades[i] > maxGrade) { // Condition to compare grades
                maxGrade = studentGrades[i]; // Update highest grade if condition is true
            }
        }
        return maxGrade; // Return highest grade
    }

    public void sortAndDisplayGrades() {
        Arrays.sort(studentGrades); // Sort the original array in ascending order
        System.out.println("Sorted Grades:");
        for (int grade : studentGrades) {
            System.out.println(grade);
        }
    }

    public boolean searchStudentByName(String name) { // Linear search to check for student name
        for (int i = 0; i < numOfResults; i++) {
            if (studentNames[i].equalsIgnoreCase(name)) {
                return true; // Return true if student is found
            }
        }
        return false; // Return false if student is not found
    }

    public static void main(String[] args) { // Main method
        GradingApplication program = new GradingApplication(); // Create instance of GradingApplication class
        program.processResults(); // Call method to process student names and grades

        Scanner myInput = new Scanner(System.in); // Create Scanner object for user input
        int userChoice; // Variable to store user choice
        do { // Loop to display menu and perform actions based on user's choice
            System.out.println("\nMenu:"); // Print menu options
            System.out.println("1. Display average class grade");
            System.out.println("2. Display lowest class grade");
            System.out.println("3. Display highest class grade");
            System.out.println("4. Sort & Display the grades in ascending order");
            System.out.println("5. Search for an individual student by name");
            System.out.println("6. Exit");
            System.out.println("Enter your choice: ");
            userChoice = myInput.nextInt(); // Read user's choice
            myInput.nextLine(); // Consume newline character

            switch (userChoice) { // Switch statement based on user's choice
                case 1: // Display average class grade
                    System.out.println("******************************");
                    System.out.println("Average class grade: " + program.calculateAverageGrade()); // Calculate and print average grade
                    System.out.println("******************************");
                    break;
                case 2: // Display lowest grade
                    System.out.println("******************************");
                    System.out.println("Lowest class grade: " + program.getLowestGrade()); // Find and print lowest grade
                    System.out.println("******************************");
                    break;
                case 3: // Display highest grade
                    System.out.println("******************************");
                    System.out.println("Highest class grade: " + program.getHighestGrade()); // Find and print highest grade
                    System.out.println("******************************");
                    break;
                case 4: // Sort and display
                    System.out.println("******************************");
                    program.sortAndDisplayGrades(); // Sort and print grades in ascending order
                    System.out.println("******************************");
                    break;
                case 5: // Case to search for a student by name
                    System.out.println("Enter student name to search: "); // Prompt user for student name
                    String name = myInput.nextLine(); // Read student name to search
                    boolean studentFound = program.searchStudentByName(name); // Search for student by name

                    if (studentFound) {
                        System.out.println("******************************");
                        System.out.println("Student found:");
                        System.out.println("******************************");
                        int studentIndex = -1;
                        for (int i = 0; i < program.numOfResults; i++) {
                            if (program.studentNames[i].equalsIgnoreCase(name)) {
                                studentIndex = i;
                                break;
                            }
                        }
                        System.out.println("Name: " + program.studentNames[studentIndex]);
                        System.out.println("Grade: " + program.studentGrades[studentIndex]);
                        System.out.println("******************************");
                    } else {
                        System.out.println("Student not found.");
                    }
                    break; // Exit switch statement
            }
        } while (userChoice != 6); // Repeat loop until user chooses to exit
    }
}
