#!/usr/bin/env python
# coding: utf-8

# In[265]:
import pandas as pd;
import numpy as np;

df = pd.read_csv('C:/xampp/htdocs/Health_Master/DataSet/dataset_N.csv')
severity = pd.read_csv('C:/xampp/htdocs/Health_Master/DataSet/symptom_severity.csv')
description = pd.read_csv('C:/xampp/htdocs/Health_Master/DataSet/symptom_Description.csv')
precaution = pd.read_csv('C:/xampp/htdocs/Health_Master/DataSet/symptom_precaution.csv')


# In[266]:


combined_df = pd.merge(df,description,on='Disease') #combining 2 dataframes


# In[267]:


combined_df = pd.merge(combined_df,precaution,on='Disease') #combining another one


# In[268]:


combined_df.columns


# In[269]:


#removing any whitespaces
cols = combined_df.columns
data = combined_df[cols].values.flatten()

s = pd.Series(data)
s = s.values.reshape(combined_df.shape)

combined_df = pd.DataFrame(s, columns=combined_df.columns)


# In[270]:


X = combined_df[['Symptom_1','Symptom_2','Symptom_3','Symptom_4',
       'Symptom_5', 'Symptom_6', 'Symptom_7', 'Symptom_8', 'Symptom_9',
       'Symptom_10', 'Symptom_11', 'Symptom_12', 'Symptom_13', 'Symptom_14',
       'Symptom_15', 'Symptom_16', 'Symptom_17']]


# In[271]:


y = combined_df['Disease']


# In[272]:


from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.model_selection import RandomizedSearchCV


# In[273]:


X_train,X_test,y_train,y_test = train_test_split(X,y,test_size=0.2,random_state=999)


# In[274]:


from sklearn.ensemble import RandomForestClassifier
rf = RandomForestClassifier()
#you can narrow down the values as you keep training
n_estimators = [int(x) for x in np.linspace(start = 200, stop = 2000, num = 10)]
max_features = ['auto', 'sqrt']
max_depth = [int(x) for x in np.linspace(10, 110, num = 11)]
max_depth.append(None)
min_samples_split = [2, 5, 10]
min_samples_leaf = [1, 2, 4]
bootstrap = [True, False]

random_grid = {'n_estimators': n_estimators,
               'max_features': max_features,
               'max_depth': max_depth,
               'min_samples_split': min_samples_split,
               'min_samples_leaf': min_samples_leaf,
               'bootstrap': bootstrap}
rf_random = RandomizedSearchCV(estimator = rf, param_distributions = random_grid, n_iter = 10, cv = 3, verbose=2, random_state=42)
rf_random.fit(X_train,y_train)


# In[275]:


rf_random.best_params_


# In[276]:


rf = RandomForestClassifier(bootstrap=True,
 max_depth=30,
 max_features= 'sqrt',
 min_samples_leaf= 1,
 min_samples_split= 5,
 n_estimators= 1400)


# In[278]:


rf.fit(X_train,y_train)


# In[281]:





# In[282]:


import pymysql
s_array = [[12,45,113,47,114,0,0,0,0,0,0,0,0,0,0,0,0]]
y_pred = rf.predict(s_array)
output = y_pred
print(y_pred)

# 連結 SQL
connect_db = pymysql.connect(host='localhost', port=3306, user='root', passwd='', charset='utf8', db='hospital')

with connect_db.cursor() as cursor:
    sql = """ INSERT INTO record(sssid,predict) VALUES ('A123457772',%s) """
    
    for hospital in y_pred:
    
    # 執行 SQL 指令
        cursor.execute(sql,(y_pred))
    
    # 提交至 SQL
    connect_db.commit()

# 關閉 SQL 連線
connect_db.close()

