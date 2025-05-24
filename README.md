x本專案旨在建構一套智慧化的預問診系統，協助家庭醫學科初診流程，以改善病患長時間候診與醫病溝通效率問題。系統整合機器學習模型（Random Forest）與專家系統架構，可透過使用者主訴症狀預測可能疾病並提供衛教資訊，輔助醫師初步診斷。

📌 技術與成果要點：

* 使用 Kaggle 資料集，涵蓋 4,920 筆病患資料、133 種症狀與 41 種疾病。

* 應用 Random Forest 演算法進行分類預測，10-fold 交叉驗證下預測準確率達 99.88%。

* 以 PHP 與網頁介面實作病患與醫師端平台，提供預診填寫、診斷推論與衛教結果呈現。

* 執行使用者滿意度調查，收集 53 位受試者的反饋並據此調整系統介面與功能。

系統概念圖
<img src="https://github.com/Jason910315/PreConsultation_System/blob/main/image.jpg?raw=true" alt="預問診系統畫面" width="600"/>


## 🌲 Random Forest = Bagging + Decision Tree + Feature Randomness
<img src="https://github.com/Jason910315/PreConsultation_System/blob/main/random_forest.jpg?raw=true" alt="預問診系統畫面" width="600"/>

**隨機森林** 是由多棵決策樹組成的集成模型，透過多數決機制進行預測。  
RF 引入了 **隨機性 (Randomness)**，使每棵樹盡可能 **獨立 (Independent)**，從而提升模型的泛化能力。

### 隨機性來源

- **資料隨機性**  
  使用 **Bagging** 技術，為每棵樹建立不同的 training set。

- **特徵隨機性**  
  在每個節點分裂時，並非從所有特徵中選擇，而是從 **隨機挑選的一部分特徵** 中選擇最佳分裂屬性，  
  讓每棵樹應用到 **不同的 attribute subset**，增加隨機性與差異性。

- **不剪枝 (Unpruning)**  
  每棵決策樹都讓其完整成長（不剪枝），提升各樹的獨立性。

> 多數 Ensemble 模型的核心在於 **decorrelation（減少基模型間的關聯性）**，讓每個 base model 的預測具有差異性，提升集成效能。

