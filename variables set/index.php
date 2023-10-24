<?php
 include('config.php');
 switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'dashboard.php';
      break; 
   case '/index.php':                   // URL (without file name) to a default screen
      require 'index.php';
      break; 
	  
   case '/dashboard.php':     // if you plan to also allow a URL with the file name 
      require 'dashboard.php';
      break;  
	  
   case '/login.php':                   // URL (without file name) to a default screen
      require 'login.php';
      break; 
	  
	  

	case '/gpuList.php':
      require 'gpuList.php';
      break;
	case '/coolantList.php':
      require 'coolantList.php';
      break;
	case '/case_typeList.php':
      require 'case_typeList.php';
      break;
	case '/cpuList.php':
      require 'cpuList.php';
      break;
	case '/monitorList.php':
      require 'monitorList.php';
      break;
	case '/psuList.php':
      require 'psuList.php';
      break;
	case '/ramList.php':
      require 'ramList.php';
      break;
	case '/motherboardList.php':
      require 'motherboardList.php';
      break;
	  
    case '/userTrans.php':
      require 'userTrans.php';
      break;
	  
	  
	case '/coolantForm.php':
      require 'coolantForm.php';
      break;
	case '/case_typeForm.php':
      require 'case_typeForm.php';
      break;
	case '/cpuForm.php':
      require 'cpuForm.php';
      break;
	case '/gpuForm.php':
      require 'gpuForm.php';
      break;
	case '/monitorForm.php':
      require 'monitorForm.php';
      break;
	case '/motherboardForm.php':
      require 'motherboardForm.php';
      break;
	case '/monitorForm.php':
      require 'monitorForm.php';
      break;
	case '/psuForm.php':
      require 'psuForm.php';
      break;
	case '/ramForm.php':
      require 'ramForm.php';
      break;
	  
	case '/addCoolant.php':
      require 'addCoolant.php';
      break;
	case '/addCaseType.php':
      require 'addCaseType.php';
      break;
	case '/addCpu.php':
      require 'addCpu.php';
      break;
	case '/addGpu.php':
      require 'addGpu.php';
      break;
	case '/addMonitor.php':
      require 'addMonitor.php';
      break;
	case '/addMotherboard.php':
      require 'addMotherboard.php';
      break;
	case '/addPSU.php':
      require 'addPSU.php';
      break;
	case '/addRAM.php':
      require 'addRAM.php';
      break;
	  
	  
	case '/deleteCoolant.php':
      require 'deleteCoolant.php';
      break;
	case '/deleteCaseType.php':
      require 'deleteCaseType.php';
      break;
	case '/deleteCPU.php':
      require 'deleteCPU.php';
      break;
	case '/deleteGPU.php':
      require 'deleteGPU.php';
      break;
	case '/deleteMonitor.php':
      require 'deleteMonitor.php';
      break;
	case '/deleteMotherboard.php':
      require 'deleteMotherboard.php';
      break;
	case '/deletePSU.php':
      require 'deletePSU.php';
      break;
	case '/deleteRAM.php':
      require 'deleteRAM.php';
      break;
	  
	case '/updateCoolantForm.php':
      require 'updateCoolantForm.php';
      break;
	case '/updateCaseTypeForm.php':
      require 'updateCaseTypeForm.php';
      break;
	case '/updateGPUForm.php':
      require 'updateGPUForm.php';
      break;
	case '/updateCPUForm.php':
      require 'updateCPUForm.php';
      break;
	case '/updateMonitorForm.php':
      require 'updateMonitorForm.php';
      break;
	case '/updatePSUForm.php':
      require 'updatePSUForm.php';
      break;
	case '/updateMotherboardForm.php':
      require 'updateMotherboardForm.php';
      break;
	case '/updateRAMForm.php':
      require 'updateRAMForm.php';
      break;
	  
	case '/updateCoolant.php':
      require 'updateCoolant.php';
      break;
	case '/updateCaseType.php':
      require 'updateCaseType.php';
      break;
	case '/updateCPU.php':
      require 'updateCPU.php';
      break;
	case '/updateGPU.php':
      require 'updateGPU.php';
      break;
	case '/updateMonitor.php':
      require 'updateMonitor.php';
      break;
    case '/updateMotherboard.php':
      require 'updateMotherboard.php';
      break;
	case '/updatePSU.php':
      require 'updatePSU.php';
      break;
	case '/updateRAM.php':
      require 'updateRAM.php';
      break;
	
	
	
	  
	case '/buyCoolant.php':
      require 'buyCoolant.php';
      break;
	case '/buyCaseType.php':
      require 'buyCaseType.php';
      break;
	case '/buyGPU.php':
      require 'buyGPU.php';
      break;
	case '/buyCPU.php':
      require 'buyCPU.php';
      break;
	case '/buyMonitor.php':
      require 'buyMonitor.php';
      break;
	case '/buyPSU.php':
      require 'buyPSU.php';
      break;
	case '/buyMotherboard.php':
      require 'buyMotherboard.php';
      break;
	case '/buyRAM.php':
      require 'buyRAM.php';
      break;
	
	case '/own.php':
      require 'own.php';
      break;
	case '/dontOwn.php':
      require 'dontOwn.php';
      break;
	  
   default:
      http_response_code(404);
      exit('Not Found');
}  
?>
