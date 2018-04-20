Google Cloud Vision PHP Sample Application
=========================
Description
------------
This is a simple application demonstrates how to invoke Google Cloud Vision API from PHP.

Next is to obtain an API key through the [Google Cloud Platform](https://cloud.google.com). To get one visit the link below.
https://cloud.google.com/vision/docs/quickstart

Requirements
------------
 - [PHP >= 5.4](http://php.net/releases/5_4_0.php)
 - [Curl extension](http://php.net/manual/en/curl.installation.php)

Features
------------
- Support almost feature of Google Cloud Vision API (Version 1)
- Auto encode images to based64

How to use
-----------
First of all you need to create Google Project to get API Key.
- Create New Project Google APIs
- Select Creating New Project
- Search Cloud Vision API Service and enable it.
- Now Generate API Key.
- Finaly we got API Key now move to Coding.
- Now Adding in config file your API Key (in /config.php file).

Basic usage
------------
```php
use GoogleCloudVisionPHP\GoogleCloudVision;

$gcv = new GoogleCloudVision();

// Follow instruction from Google Cloud Vision Document
$gcv->setKey("ADD_YOUR_API_KEY_HERE");

$gcv->setImage("[File path]");

// 1 is Max result
$gcv->addFeature("LABEL_DETECTION", 1);

$gcv->addFeatureUnspecified(1);
$gcv->addFeatureFaceDetection(1);
$gcv->addFeatureLandmarkDetection(1);
$gcv->addFeatureLogoDetection(1);
$gcv->addFeatureLabelDetection(1);
$gcv->addFeatureOCR(1);
$gcv->addFeatureSafeSeachDetection(1);
$gcv->addFeatureImageProperty(1);

$response = $gcv->request();

```

Available features
------------------
| Name                                                                                | 
| :-----------------------------------------------------------------------------------| 
| [LABEL_DETECTION](https://cloud.google.com/vision/docs/detecting-labels)            | 
| [TEXT_DETECTION](https://cloud.google.com/vision/docs/detecting-text)               | 
| [FACE_DETECTION](https://cloud.google.com/vision/docs/detecting-faces)              | 
| [LANDMARK_DETECTION](https://cloud.google.com/vision/docs/detecting-landmarks)      | 
| [LOGO_DETECTION](https://cloud.google.com/vision/docs/detecting-logos)              | 
| [SAFE_SEARCH_DETECTION](https://cloud.google.com/vision/docs/detecting-safe-search) | 
| [IMAGE_PROPERTIES](https://cloud.google.com/vision/docs/detecting-properties)       | 
| [WEB_DETECTION](https://cloud.google.com/vision/docs/detecting-web)                 | 
| [CROP_HINTS](https://cloud.google.com/vision/docs/detecting-crop-hints)             | 
| [DOCUMENT_TEXT_DETECTION](https://cloud.google.com/vision/docs/detecting-fulltext)  |