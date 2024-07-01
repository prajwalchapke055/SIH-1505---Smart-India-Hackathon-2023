import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.svm import SVC
from sklearn.metrics import accuracy_score
import joblib
import serial
import time

import sys # For saving and loading the model (replace with joblib in newer versions)
# print('hiiii')
val1=sys.argv[1]
val2=sys.argv[2]
val3=sys.argv[3]
val4=sys.argv[4]
val5=sys.argv[5]
val6=sys.argv[6]  
# print(c)



def train_and_evaluate_svm(X_train, y_train, X_test, y_test, kernel="linear"):
    # Initialize SVM classifier
    svm_classifier = SVC(kernel=kernel)
    
    # Train the classifier on the training data
    svm_classifier.fit(X_train, y_train)
    
    # Make predictions on the test data
    y_pred = svm_classifier.predict(X_test)
    
    # Calculate accuracy
    accuracy = accuracy_score(y_test, y_pred)
   #print(f'Accuracy: {accuracy * 100:.2f}%')
    
    # Save the trained model
    joblib.dump(svm_classifier, 'svm_model.joblib')
    #print('Model saved as svm_model.joblib')

# Load the dataset
dataset = pd.read_csv(r"finalone.csv")
#print(dataset.head(10))

# Separate features and target variable
X = dataset.iloc[:, 0:6]  # Assuming the features are in the first 6 columns
Y = dataset.iloc[:, -1]   # Assuming the target variable is in the last column

# Scale the features
sc = StandardScaler()
X = sc.fit_transform(X)

# Split data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, Y, test_size=0.2, random_state=42)
# print('hiiii6')
# Specify parameters and call the function
kernel_type = "linear"  # You can change the kernel type (linear, polynomial, radial basis function, etc.)
train_and_evaluate_svm(X_train, y_train, X_test, y_test, kernel=kernel_type)
# print('hiiii5')
# Load the saved model
loaded_model = joblib.load('svm_model.joblib')
# print('hiiii4')
# Now, let's make predictions for new data
# new_data = pd.DataFrame({
#     ' MQ-3 (Alcohol Sensor)(mg/L)': [25.18],
#     ' MQ-4 (Methane Sensor)(ppm)': [300.01],
#     ' MQ-7 (CO Sensor)(ppm)': [25.10],
#     ' MQ-8 (Hydrogen Sensor)(ppm)': [210.00],

#     ' MQ-9 (CO Sensor)(ppm)': [205.67],
#     ' MQ-135 (Air Quality Sensor)(ppm)': [300.80]
# })
# print('hiiii3')

new_data = pd.DataFrame({
    ' MQ-3 (Alcohol Sensor)(mg/L)': [val1],
    ' MQ-4 (Methane Sensor)(ppm)': [val2],
    ' MQ-7 (CO Sensor)(ppm)': [val3],
    ' MQ-8 (Hydrogen Sensor)(ppm)': [val4],
    ' MQ-9 (CO Sensor)(ppm)': [val5],
    ' MQ-135 (Air Quality Sensor)(ppm)':[val6]
})

# print('hiiii2')
# Scale the new data using the same scaler used for training data
new_data_scaled = sc.transform(new_data)

# Use the loaded SVM model to predict the target variable for the new data
predicted_y = loaded_model.predict(new_data_scaled)
c={predicted_y[0]}
#print(f'Predicted Y: {predicted_y[0]}')
print(f'{predicted_y[0]}')
aaa=(f'{predicted_y[0]}')




# Define the serial port and baud rate
serial_port = 'COM6'  # Change this to the correct port on your system
baud_rate = 9600

# Create a serial object
ser = serial.Serial(serial_port, baud_rate, timeout=1)

try:
    # Wait for the Arduino to initialize
    time.sleep(2)

    # Send data to the Arduino to turn on the LED
    data_to_send = aaa
    ser.write(data_to_send.encode())
    # print(f": {data_to_send}")
 
    # print(f": {predicted_y[0]}")

    # Read data from the Arduino (if needed)
    data_received = ser.readline().decode().strip()
    # print(f": {data_received}")
    pass

except Exception as e:
    # print(f": {e}")
    pass

finally:
    # Close the serial connection
    ser.close()
