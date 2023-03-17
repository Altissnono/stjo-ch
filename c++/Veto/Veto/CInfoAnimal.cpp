// CInfoAnimal.cpp : fichier d'implémentation
//

#include "pch.h"
#include "Veto.h"
#include "CInfoAnimal.h"
#include "afxdialogex.h"


// boîte de dialogue de CInfoAnimal

IMPLEMENT_DYNAMIC(CInfoAnimal, CDialogEx)

CInfoAnimal::CInfoAnimal(CWnd* pParent /*=nullptr*/)
	: CDialogEx(IDD_INFOANIMAL, pParent)
{

}

CInfoAnimal::~CInfoAnimal()
{
}

void CInfoAnimal::DoDataExchange(CDataExchange* pDX)
{
	CDialogEx::DoDataExchange(pDX);
}


BEGIN_MESSAGE_MAP(CInfoAnimal, CDialogEx)
END_MESSAGE_MAP()


// gestionnaires de messages de CInfoAnimal
