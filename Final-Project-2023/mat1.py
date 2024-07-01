import pandas as pd
import matplotlib.pyplot as plt

# Replace 'path/to/your/csv/file.csv' with the actual path to your CSV file
csv_file_path = 'finalone.csv'

# Read CSV data into a DataFrame
df = pd.read_csv(csv_file_path)

# Plot histograms for each sensor
fig, axes = plt.subplots(nrows=2, ncols=3, figsize=(15, 8))
fig.suptitle('Histograms for MQ Sensors')

# Iterate through each column and plot a histogram
for i, column in enumerate(df.columns[:-1]):  # Exclude the last column ('Fire') which is the target variable
    ax = axes[i // 3, i % 3]
    ax.hist(df[column], bins=10, color='skyblue', edgecolor='black')
    ax.set_title(column)
    ax.set_xlabel('Sensor Value')
    ax.set_ylabel('Frequency')

# Adjust layout
plt.tight_layout(rect=[0, 0, 1, 0.95])

# manager=plt.get_current_fig_manager()
# manager.window.state('zoomed')
# Show the plot
plt.show()
