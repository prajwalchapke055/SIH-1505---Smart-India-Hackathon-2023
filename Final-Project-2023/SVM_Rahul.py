# -*- coding: utf-8 -*-
"""
Created on Fri Dec 15 22:00:42 2023

@author: Anil
"""

import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.svm import SVC
from sklearn.metrics import accuracy_score



# Assuming your CSV has a column named 'label' for target labels and other columns as features
dataset = pd.read_csv(r"C:/Users/Anil/Downloads/FINAL READING HOME.csv")
print(dataset.head(10))

# Separate features and target variable
X = dataset.iloc[:, 0:6]  # Assuming the features are in the first 6 columns
Y = dataset.iloc[:, 6]     # Assuming the target variable is in the 7th column

# Scale the features
sc = StandardScaler()
X = sc.fit_transform(X)

# Split data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, Y, test_size=0.2, random_state=42)


# Initialize SVM classifier
svm_classifier = SVC(kernel="linear")  # You can change the kernel type (linear, polynomial, radial basis function, etc.)

# Train the classifier on the training data
svm_classifier.fit(X_train, y_train)

# Make predictions on the test data
y_pred = svm_classifier.predict(X_test)

# Calculate accuracy
accuracy = accuracy_score(y_test, y_pred)
print(f'Accuracy: {accuracy * 100:.2f}%')
